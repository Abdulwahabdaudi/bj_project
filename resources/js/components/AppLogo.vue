<script setup lang="ts">
import AppLogoIcon from '@/components/AppLogoIcon.vue';
</script>

<template>
    <div
        class="flex aspect-square size-8 items-center justify-center rounded-md bg-sidebar-primary text-sidebar-primary-foreground">

        <div class="rounded-xl group-hover:rotate-6 transition-transform duration-300">
            <img src="../assets/LOGO.png" alt="Logo" class="h-10 w-auto object-contain">
        </div>

        <!-- <AppLogoIcon class="size-5 fill-current text-white dark:text-black" /> -->
    </div>
    <div class="ml-1 grid flex-1 text-left text-sm">
        <span class="mb-0.5 truncate font-semibold leading-none">BJ DESIGN AND CONSTRUCTION</span>
    </div>
</template>
