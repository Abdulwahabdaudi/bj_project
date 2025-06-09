<script setup>
import { Link, router } from '@inertiajs/vue3'
import { ref, onMounted } from 'vue'
import { ArrowLeft } from 'lucide-vue-next'

const props = defineProps({
    project: {
        type: Object,
        required: true
    }
})

const form = ref({
    title: '',
    description: '',
    place: '',
    status: '',
    category: '',
    duration: '',
    image: null
})

const isSubmitting = ref(false)

onMounted(() => {
    form.value = {
        title: props.project.title,
        description: props.project.description,
        place: props.project.place,
        status: props.project.status,
        category: props.project.category,
        duration: props.project.duration,
        image: null
    }
})

const submit = () => {
    isSubmitting.value = true
    
    const formData = new FormData()
    Object.keys(form.value).forEach(key => {
        if (form.value[key] !== null) {
            formData.append(key, form.value[key])
        }
    })

    router.post(route('admin.projects.update', props.project.id), formData, {
        onSuccess: () => {
            isSubmitting.value = false
        },
        onError: () => {
            isSubmitting.value = false
        }
    })
}
</script>

<template>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <div class="flex items-center">
                    <Link :href="route('admin.projects.index')" class="text-gray-600 hover:text-gray-900 mr-4">
                        <ArrowLeft class="w-5 h-5" />
                    </Link>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Edit Project</h1>
                        <p class="mt-2 text-gray-600">Update project information</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <form @submit.prevent="submit" class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Project Title *</label>
                        <input id="title" v-model="form.title" type="text" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                        <textarea id="description" v-model="form.description" rows="4" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"></textarea>
                    </div>

                    <div>
                        <label for="place" class="block text-sm font-medium text-gray-700 mb-2">Location *</label>
                        <input id="place" v-model="form.place" type="text" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                        <select id="status" v-model="form.status" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                            <option value="Haijakamilika">Haijakamilika</option>
                            <option value="Imekamilika">Imekamilika</option>
                        </select>
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                        <input id="category" v-model="form.category" type="text" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <div>
                        <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">Duration *</label>
                        <input id="duration" v-model="form.duration" type="text" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500">
                    </div>

                    <div class="flex justify-end space-x-4">
                        <Link :href="route('admin.projects.index')" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</Link>
                        <button type="submit" :disabled="isSubmitting" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 disabled:opacity-50">
                            {{ isSubmitting ? 'Updating...' : 'Update Project' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template> 