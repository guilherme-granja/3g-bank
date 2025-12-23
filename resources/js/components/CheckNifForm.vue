<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { useNifFormatter } from '@/composables/useNifFormatter';
import { login, register } from '@/routes';
import { checkNif } from '@/routes/onboarding';
import { router } from '@inertiajs/vue3';
import { apiFetchJson } from '@/lib/http';
import { ref } from 'vue';

const nif = ref('');
const isLoading = ref(false);

const { getNumericNif, isValidNif } = useNifFormatter(nif);

const handleCheckNif = async () => {
    const numericNif = getNumericNif();

    if (!isValidNif() || isLoading.value) {
        return;
    }

    isLoading.value = true;

    try {
        const data = await apiFetchJson<{ exists: boolean }>(
            checkNif({ query: { nif: numericNif } }).url,
        );

        if (data.exists) {
            router.visit(login().url);
        } else {
            router.visit(register().url);
        }
    } catch (error) {
        console.error('Error checking NIF:', error);
    } finally {
        isLoading.value = false;
    }
};
</script>

<template>
    <div class="flex flex-col gap-4">
        <div class="grid gap-2">
            <Input
                v-model="nif"
                type="text"
                placeholder="000.000.000"
                class="h-12 text-lg"
                :disabled="isLoading"
                autofocus
            />
        </div>
        <Button
            @click="handleCheckNif"
            :disabled="isLoading || !isValidNif()"
            class="h-12 w-full text-base"
        >
            {{ isLoading ? 'Checking...' : 'Check' }}
        </Button>
    </div>
</template>
