<script setup>
import { Link, router } from '@inertiajs/vue3'
import { ref } from 'vue'
import { 
    Plus, 
    Edit, 
    Trash2, 
    Eye,
    CheckCircle,
    Clock
} from 'lucide-vue-next'

const props = defineProps({
    projects: {
        type: Array,
        default: () => []
    }
})

const deleteProject = (id) => {
    if (confirm('Are you sure you want to delete this project?')) {
        router.delete(route('admin.projects.destroy', id))
    }
}

const getStatusIcon = (status) => {
    return status === 'Imekamilika' ? CheckCircle : Clock
}

const getStatusColor = (status) => {
    return status === 'Imekamilika' 
        ? 'bg-green-100 text-green-800' 
        : 'bg-yellow-100 text-yellow-800'
}
</script>

<template>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Manage Projects</h1>
                        <p class="mt-2 text-gray-600">Add, edit, and manage your construction projects</p>
                    </div>
                    <Link 
                        :href="route('admin.projects.create')"
                        class="inline-flex items-center px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors"
                    >
                        <Plus class="w-5 h-5 mr-2" />
                        Add New Project
                    </Link>
                </div>
            </div>

            <!-- Projects Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Project
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Location
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Duration
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="project in projects" :key="project.id" class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-12 w-12">
                                            <img 
                                                v-if="project.image" 
                                                :src="`/storage/${project.image}`" 
                                                :alt="project.title"
                                                class="h-12 w-12 rounded-lg object-cover"
                                            >
                                            <div 
                                                v-else 
                                                class="h-12 w-12 rounded-lg bg-gray-200 flex items-center justify-center"
                                            >
                                                <span class="text-gray-500 text-xs">No Image</span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ project.title }}
                                            </div>
                                            <div class="text-sm text-gray-500 line-clamp-2">
                                                {{ project.description }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ project.place }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span 
                                        :class="getStatusColor(project.status)"
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium"
                                    >
                                        <component :is="getStatusIcon(project.status)" class="w-4 h-4 mr-1" />
                                        {{ project.status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ project.category }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ project.duration }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <Link 
                                            :href="route('admin.projects.show', project.id)"
                                            class="text-blue-600 hover:text-blue-900"
                                        >
                                            <Eye class="w-5 h-5" />
                                        </Link>
                                        <Link 
                                            :href="route('admin.projects.edit', project.id)"
                                            class="text-green-600 hover:text-green-900"
                                        >
                                            <Edit class="w-5 h-5" />
                                        </Link>
                                        <button 
                                            @click="deleteProject(project.id)"
                                            class="text-red-600 hover:text-red-900"
                                        >
                                            <Trash2 class="w-5 h-5" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Empty State -->
            <div v-if="projects.length === 0" class="text-center py-12">
                <div class="text-gray-500">
                    <p class="text-lg">No projects found</p>
                    <p class="mt-2">Get started by creating your first project</p>
                    <Link 
                        :href="route('admin.projects.create')"
                        class="mt-4 inline-flex items-center px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition-colors"
                    >
                        <Plus class="w-5 h-5 mr-2" />
                        Add New Project
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template> 