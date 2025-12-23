<script setup lang="ts">
import { Button } from '@/components/ui/button';
import GuestLayout from '@/layouts/GuestLayout.vue';
import { checkNif } from '@/routes/auth';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <GuestLayout title="3G Bank">
        <h1 class="mb-1 font-medium">3G Bank — Banking that moves with you</h1>
        <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">
            Let's go together.
        </p>
        <ul class="mb-4 flex flex-col lg:mb-6">
            <li
                class="relative flex items-center gap-4 py-2 before:absolute before:top-1/2 before:bottom-0 before:left-[0.4rem] before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A]"
            >
                <span class="relative bg-white py-1 dark:bg-[#161615]">
                    <span
                        class="flex h-3.5 w-3.5 items-center justify-center rounded-full border border-[#e3e3e0] bg-[#FDFDFC] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] dark:border-[#3E3E3A] dark:bg-[#161615]"
                    >
                        <span
                            class="h-1.5 w-1.5 rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A]"
                        />
                    </span>
                </span>
                <span> Create your account </span>
            </li>
            <li
                class="relative flex items-center gap-4 py-2 before:absolute before:top-0 before:bottom-1/2 before:left-[0.4rem] before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A]"
            >
                <span class="relative bg-white py-1 dark:bg-[#161615]">
                    <span
                        class="flex h-3.5 w-3.5 items-center justify-center rounded-full border border-[#e3e3e0] bg-[#FDFDFC] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] dark:border-[#3E3E3A] dark:bg-[#161615]"
                    >
                        <span
                            class="h-1.5 w-1.5 rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A]"
                        />
                    </span>
                </span>
                <span> Unlock your potential </span>
            </li>
            <li
                class="relative flex items-center gap-4 py-2 before:absolute before:top-0 before:bottom-1/2 before:left-[0.4rem] before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A]"
            >
                <span class="relative bg-white py-1 dark:bg-[#161615]">
                    <span
                        class="flex h-3.5 w-3.5 items-center justify-center rounded-full border border-[#e3e3e0] bg-[#FDFDFC] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] dark:border-[#3E3E3A] dark:bg-[#161615]"
                    >
                        <span
                            class="h-1.5 w-1.5 rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A]"
                        />
                    </span>
                </span>
                <span> And Start your journey </span>
            </li>
        </ul>
        <ul class="flex gap-3 text-sm leading-normal">
            <li>
                <Button as-child>
                    <Link :href="checkNif().url"> Get Started </Link>
                </Button>
            </li>
        </ul>
    </GuestLayout>
</template>
