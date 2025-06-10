<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link, usePage } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import { Briefcase, Plus, Edit, Eye } from 'lucide-vue-next';
import { computed } from 'vue'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

const auth = computed(() => usePage().props.auth)
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="min-h-screen bg-gray-100 py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-2xl font-bold mb-4">
                            Welcome, {{ auth.user.name }}!
                        </h1>
                        
                        <div v-if="auth.user.is_admin" class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <h2 class="text-lg font-semibold text-blue-800 mb-2">Admin Dashboard</h2>
                            <p class="text-blue-700 mb-4">You have administrative privileges.</p>
                            <a href="/admin/projects" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Manage Projects
                            </a>
                        </div>
                        
                        <div v-else class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <h2 class="text-lg font-semibold text-green-800 mb-2">User Dashboard</h2>
                            <p class="text-green-700">Welcome to your user dashboard.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
