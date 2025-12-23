import { createApp, ref } from 'vue';
import ToastContainer from '@/components/ToastContainer.vue';

export type ToastVariant = 'danger' | 'warning';

export interface ToastItem {
    id: number;
    message: string;
    variant: ToastVariant;
    duration: number;
}

export const toasts = ref<ToastItem[]>([]);

let idCounter = 1;
let isMounted = false;

export function showToast(message: string, variant: ToastVariant, duration = 5000) {
    // Lazily ensure the container is mounted when a toast is first shown
    if (!isMounted) installToast();
    const id = idCounter++;
    const item: ToastItem = { id, message, variant, duration };
    toasts.value.push(item);

    window.setTimeout(() => dismissToast(id), duration);
    return id;
}

export function dismissToast(id: number) {
    toasts.value = toasts.value.filter((t) => t.id !== id);
}

export function installToast() {
    if (typeof window === 'undefined' || isMounted) return;

    const host = document.createElement('div');
    host.id = 'toast-container-host';
    document.body.appendChild(host);

    const app = createApp(ToastContainer);
    app.mount(host);

    isMounted = true;
}
