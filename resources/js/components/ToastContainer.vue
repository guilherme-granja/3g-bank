<script setup lang="ts">
import { computed } from 'vue';
import { dismissToast, toasts } from '@/composables/useToast';

const classesByVariant = computed<Record<string, string>>(() => ({
  danger:
    'border-red-300 bg-red-50 text-red-800 dark:border-red-800 dark:bg-red-900/40 dark:text-red-200',
  warning:
    'border-yellow-300 bg-yellow-50 text-yellow-800 dark:border-yellow-800 dark:bg-yellow-900/40 dark:text-yellow-200',
}));
</script>

<template>
  <div class="pointer-events-none fixed right-4 top-4 z-[9999] flex w-auto max-w-[96vw] flex-col gap-2 sm:max-w-sm">
    <div
      v-for="t in toasts"
      :key="t.id"
      class="pointer-events-auto w-full rounded-md border p-3 shadow-lg"
      role="alert"
      :aria-label="t.variant === 'danger' ? 'Error' : 'Warning'"
      :class="classesByVariant[t.variant]"
    >
      <div class="flex items-start gap-3">
        <div class="min-w-0 flex-1 break-words">
          <p class="text-sm leading-5">{{ t.message }}</p>
        </div>
        <button
          type="button"
          class="-m-1 inline-flex h-6 w-6 items-center justify-center rounded opacity-70 transition hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-offset-2"
          aria-label="Close"
          @click="dismissToast(t.id)"
        >
          <span class="text-base leading-none">×</span>
        </button>
      </div>
    </div>
  </div>
</template>
