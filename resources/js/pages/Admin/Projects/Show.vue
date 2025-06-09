<script setup>
import { Link } from '@inertiajs/vue3'
import { ArrowLeft, Edit } from 'lucide-vue-next'

const props = defineProps({
    project: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <Link :href="route('admin.projects.index')" class="text-gray-600 hover:text-gray-900 mr-4">
                            <ArrowLeft class="w-5 h-5" />
                        </Link>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">{{ project.title }}</h1>
                            <p class="mt-2 text-gray-600">Project Details</p>
                        </div>
                    </div>
                    <Link :href="route('admin.projects.edit', project.id)" class="inline-flex items-center px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">
                        <Edit class="w-5 h-5 mr-2" />
                        Edit Project
                    </Link>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Project Information</h3>
                            <dl class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Title</dt>
                                    <dd class="text-sm text-gray-900">{{ project.title }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Description</dt>
                                    <dd class="text-sm text-gray-900">{{ project.description }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Location</dt>
                                    <dd class="text-sm text-gray-900">{{ project.place }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                                    <dd class="text-sm text-gray-900">
                                        <span :class="project.status === 'Imekamilika' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
                                            {{ project.status }}
                                        </span>
                                    </dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Category</dt>
                                    <dd class="text-sm text-gray-900">{{ project.category }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Duration</dt>
                                    <dd class="text-sm text-gray-900">{{ project.duration }}</dd>
                                </div>
                            </dl>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Project Image</h3>
                            <div v-if="project.image" class="aspect-w-16 aspect-h-9">
                                <img :src="`/storage/${project.image}`" :alt="project.title" class="w-full h-64 object-cover rounded-lg">
                            </div>
                            <div v-else class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center">
                                <span class="text-gray-500">No image available</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template> 