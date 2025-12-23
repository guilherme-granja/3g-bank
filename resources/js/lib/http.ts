import { showToast } from '@/composables/useToast';

export class HttpError<T = any> extends Error {
    status: number;
    payload?: T;
    constructor(message: string, status: number, payload?: T) {
        super(message);
        this.name = 'HttpError';
        this.status = status;
        this.payload = payload;
    }
}

async function parseJsonSafely<T = any>(response: Response): Promise<T | undefined> {
    const text = await response.text().catch(() => '');
    if (!text) return undefined;
    try {
        return JSON.parse(text) as T;
    } catch {
        return undefined;
    }
}

function extractMessage(body: any, fallback: string): string {
    if (!body) return fallback;

    if (typeof body === 'string') return body;

    if (typeof body.message === 'string' && body.message.trim().length > 0) {
        return body.message;
    }

    if (body.errors && typeof body.errors === 'object') {
        const firstKey = Object.keys(body.errors)[0];
        if (firstKey && Array.isArray(body.errors[firstKey]) && body.errors[firstKey].length) {
            return String(body.errors[firstKey][0]);
        }
    }

    return fallback;
}

export async function apiFetch(input: RequestInfo | URL, init?: RequestInit): Promise<Response> {
    // Build headers using the Headers API to support all HeadersInit shapes
    const headers = new Headers({ Accept: 'application/json' });
    if (init?.headers) {
        new Headers(init.headers).forEach((value, key) => headers.set(key, value));
    }

    const mergedInit: RequestInit = {
        ...init,
        headers,
    };

    const response = await fetch(input, mergedInit);

    if (!response.ok) {
        const status = response.status;
        const body = await parseJsonSafely(response);

        if (status >= 500) {
            showToast('Ops! A error occur. Contact support.', 'danger');
        } else if (status >= 400) {
            const msg = extractMessage(body, `Request failed (${status})`);
            showToast(msg, 'warning');
        }

        const message = status >= 500
            ? 'Server error'
            : extractMessage(body, 'Client error');
        throw new HttpError(message, status, body);
    }

    return response;
}

export async function apiFetchJson<T = any>(input: RequestInfo | URL, init?: RequestInit): Promise<T> {
    const response = await apiFetch(input, init);
    return (await response.json()) as T;
}
