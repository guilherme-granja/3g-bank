<script setup lang="ts">
import CheckNifForm from '@/components/CheckNifForm.vue';
import GuestLayout from '@/layouts/GuestLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <GuestLayout title="Check NIF - 3G Bank">
        <div class="mb-8">
            <h1 class="mb-1 text-xl font-medium">Let check your NIF</h1>
            <p class="text-[#706f6c] dark:text-[#A1A09A]">
                Please enter your Tax Identification Number to proceed.
            </p>
        </div>

        <CheckNifForm />

        <div class="mt-6 text-center">
            <Link
                href="/"
                class="text-sm text-[#706f6c] transition-colors hover:text-[#1b1b18] dark:text-[#A1A09A] dark:hover:text-[#EDEDEC]"
            >
                Back to home
            </Link>
        </div>
    </GuestLayout>
</template>
