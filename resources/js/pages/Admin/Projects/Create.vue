<script setup>
import { Link, useForm } from '@inertiajs/vue3'
import { ref } from 'vue'
import { ArrowLeft, Upload } from 'lucide-vue-next'
import AppLayout from '@/layouts/AppLayout.vue'

const props = defineProps({
    errors: {
        type: Object,
        default: () => ({})
    }
})

const breadcrumbs = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
    {
        title: 'Projects',
        href: '/admin/projects',
    },
    {
        title: 'Create Project',
        href: '/admin/projects/create',
    },
]

const form = useForm({
    title: '',
    description: '',
    place: '',
    status: 'Haijakamilika',
    category: '',
    duration: '',
    image: null
})

const imagePreview = ref(null)

const handleImageChange = (event) => {
    const file = event.target.files[0]
    if (file) {
        form.image = file
        const reader = new FileReader()
        reader.onload = (e) => {
            imagePreview.value = e.target.result
        }
        reader.readAsDataURL(file)
    }
}

const submit = () => {
    form.post(route('admin.projects.store'))
}
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="space-y-6">
            <!-- Header -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <Link :href="route('admin.projects.index')" class="text-gray-600 hover:text-gray-900 mr-4">
                        <ArrowLeft class="w-5 h-5" />
                    </Link>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Create New Project</h1>
                        <p class="mt-2 text-gray-600">Add a new construction project to your portfolio</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="bg-white rounded-lg shadow">
                <form @submit.prevent="submit" class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title -->
                        <div class="md:col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Project Title
                            </label>
                            <input
                                id="title"
                                v-model="form.title"
                                type="text"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                :class="{ 'border-red-500': form.errors.title }"
                            >
                            <p v-if="form.errors.title" class="mt-1 text-sm text-red-600">
                                {{ form.errors.title }}
                            </p>
                        </div>

                        <!-- Description -->
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Description
                            </label>
                            <textarea
                                id="description"
                                v-model="form.description"
                                rows="4"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                :class="{ 'border-red-500': form.errors.description }"
                            ></textarea>
                            <p v-if="form.errors.description" class="mt-1 text-sm text-red-600">
                                {{ form.errors.description }}
                            </p>
                        </div>

                        <!-- Location -->
                        <div>
                            <label for="place" class="block text-sm font-medium text-gray-700 mb-2">
                                Location
                            </label>
                            <input
                                id="place"
                                v-model="form.place"
                                type="text"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                :class="{ 'border-red-500': form.errors.place }"
                            >
                            <p v-if="form.errors.place" class="mt-1 text-sm text-red-600">
                                {{ form.errors.place }}
                            </p>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                                Status
                            </label>
                            <select
                                id="status"
                                v-model="form.status"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                :class="{ 'border-red-500': form.errors.status }"
                            >
                                <option value="Haijakamilika">Haijakamilika</option>
                                <option value="Imekamilika">Imekamilika</option>
                            </select>
                            <p v-if="form.errors.status" class="mt-1 text-sm text-red-600">
                                {{ form.errors.status }}
                            </p>
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                                Category
                            </label>
                            <input
                                id="category"
                                v-model="form.category"
                                type="text"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                :class="{ 'border-red-500': form.errors.category }"
                            >
                            <p v-if="form.errors.category" class="mt-1 text-sm text-red-600">
                                {{ form.errors.category }}
                            </p>
                        </div>

                        <!-- Duration -->
                        <div>
                            <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">
                                Duration
                            </label>
                            <input
                                id="duration"
                                v-model="form.duration"
                                type="text"
                                placeholder="e.g., 6 months"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent"
                                :class="{ 'border-red-500': form.errors.duration }"
                            >
                            <p v-if="form.errors.duration" class="mt-1 text-sm text-red-600">
                                {{ form.errors.duration }}
                            </p>
                        </div>

                        <!-- Image Upload -->
                        <div class="md:col-span-2">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                Project Image
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <Upload class="mx-auto h-12 w-12 text-gray-400" />
                                    <div class="flex text-sm text-gray-600">
                                        <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-orange-600 hover:text-orange-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-orange-500">
                                            <span>Upload a file</span>
                                            <input
                                                id="image"
                                                type="file"
                                                accept="image/*"
                                                class="sr-only"
                                                @change="handleImageChange"
                                            >
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                            <div v-if="imagePreview" class="mt-4">
                                <img :src="imagePreview" alt="Preview" class="h-32 w-32 object-cover rounded-lg">
                            </div>
                            <p v-if="form.errors.image" class="mt-1 text-sm text-red-600">
                                {{ form.errors.image }}
                            </p>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-3">
                        <Link
                            :href="route('admin.projects.index')"
                            class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500"
                        >
                            Cancel
                        </Link>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="px-4 py-2 bg-orange-600 text-white rounded-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 disabled:opacity-50"
                        >
                            {{ form.processing ? 'Creating...' : 'Create Project' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </AppLayout>
</template> 