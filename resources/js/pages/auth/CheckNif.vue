<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import AppLogo from '@/components/AppLogo.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { ref } from 'vue';
import { router } from '@inertiajs/vue3';
import { register } from '@/routes';

const nif = ref('');

const handleCheckNif = () => {
    // For now, just redirect to register
    router.visit(register().url);
};
</script>

<template>
    <Head title="Check NIF - 3G Bank">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div
        class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center lg:p-8 dark:bg-[#0a0a0a]"
    >
        <div
            class="flex w-full items-center justify-center opacity-100 transition-opacity duration-750 lg:grow starting:opacity-0"
        >
            <main
                class="flex w-full max-w-[335px] flex-col-reverse overflow-hidden rounded-lg lg:max-w-4xl lg:flex-row"
            >
                <div
                    class="flex-1 rounded-br-lg rounded-bl-lg bg-white p-6 pb-12 text-[13px] leading-[20px] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] lg:rounded-tl-lg lg:rounded-br-none lg:p-20 dark:bg-[#161615] dark:text-[#EDEDEC] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"
                >
                    <div class="mb-8">
                        <h1 class="mb-1 text-xl font-medium">Let check your NIF</h1>
                        <p class="text-[#706f6c] dark:text-[#A1A09A]">
                            Please enter your Tax Identification Number to proceed.
                        </p>
                    </div>

                    <div class="flex flex-col gap-4">
                        <div class="grid gap-2">
                            <Input
                                v-model="nif"
                                type="text"
                                placeholder="NIF"
                                class="h-12 text-lg"
                                autofocus
                            />
                        </div>
                        <Button @click="handleCheckNif" class="h-12 w-full text-base">
                            Check
                        </Button>
                    </div>

                    <div class="mt-6 text-center">
                        <Link
                            href="/"
                            class="text-sm text-[#706f6c] hover:text-[#1b1b18] dark:text-[#A1A09A] dark:hover:text-[#EDEDEC] transition-colors"
                        >
                            Back to home
                        </Link>
                    </div>
                </div>
                <div
                    class="relative -mb-px aspect-335/376 w-full shrink-0 overflow-hidden rounded-t-lg lg:mb-0 lg:-ml-px lg:aspect-auto lg:w-[438px] lg:rounded-t-none lg:rounded-r-lg"
                >
                    <AppLogo></AppLogo>
                    <div
                        class="absolute inset-0 rounded-t-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] lg:overflow-hidden lg:rounded-t-none lg:rounded-r-lg dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"
                    />
                </div>
            </main>
        </div>
        <div class="hidden h-14.5 lg:block"></div>
    </div>
</template>
