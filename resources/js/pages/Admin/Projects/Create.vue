<script setup>
import { router } from '@inertiajs/vue3'
import { ref } from 'vue'
import { 
    ArrowLeft, 
    Upload,
    X
} from 'lucide-vue-next'

const form = ref({
    title: '',
    description: '',
    place: '',
    status: 'Haijakamilika',
    category: '',
    duration: '',
    image: null
})

const imagePreview = ref(null)
const isSubmitting = ref(false)

const handleImageChange = (event) => {
    const file = event.target.files[0]
    if (file) {
        form.value.image = file
        const reader = new FileReader()
        reader.onload = (e) => {
            imagePreview.value = e.target.result
        }
        reader.readAsDataURL(file)
    }
}

const removeImage = () => {
    form.value.image = null
    imagePreview.value = null
}

const submit = () => {
    isSubmitting.value = true
    
    const formData = new FormData()
    Object.keys(form.value).forEach(key => {
        if (form.value[key] !== null) {
            formData.append(key, form.value[key])
        }
    })

    router.post(route('admin.projects.store'), formData, {
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
            <!-- Header -->
            <div class="mb-8">
                <div class="flex items-center">
                    <Link 
                        :href="route('admin.projects.index')"
                        class="text-gray-600 hover:text-gray-900 mr-4"
                    >
                        <ArrowLeft class="w-5 h-5" />
                    </Link>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Create New Project</h1>
                        <p class="mt-2 text-gray-600">Add a new construction project to your portfolio</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <div class="bg-white rounded-lg shadow p-6">
                <form @submit.prevent="submit" class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Project Title *
                        </label>
                        <input
                            id="title"
                            v-model="form.title"
                            type="text"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                            placeholder="Enter project title"
                        >
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Description *
                        </label>
                        <textarea
                            id="description"
                            v-model="form.description"
                            rows="4"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                            placeholder="Describe the project details"
                        ></textarea>
                    </div>

                    <!-- Place -->
                    <div>
                        <label for="place" class="block text-sm font-medium text-gray-700 mb-2">
                            Location *
                        </label>
                        <input
                            id="place"
                            v-model="form.place"
                            type="text"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                            placeholder="Enter project location"
                        >
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status *
                        </label>
                        <select
                            id="status"
                            v-model="form.status"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                        >
                            <option value="Haijakamilika">Haijakamilika</option>
                            <option value="Imekamilika">Imekamilika</option>
                        </select>
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                            Category *
                        </label>
                        <input
                            id="category"
                            v-model="form.category"
                            type="text"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                            placeholder="e.g., Makazi, Biashara, Viwanda"
                        >
                    </div>

                    <!-- Duration -->
                    <div>
                        <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">
                            Duration *
                        </label>
                        <input
                            id="duration"
                            v-model="form.duration"
                            type="text"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500 focus:border-orange-500"
                            placeholder="e.g., 8 miezi, 18 miezi"
                        >
                    </div>

                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Project Image
                        </label>
                        
                        <!-- Image Preview -->
                        <div v-if="imagePreview" class="mb-4">
                            <div class="relative inline-block">
                                <img 
                                    :src="imagePreview" 
                                    alt="Preview" 
                                    class="h-32 w-32 object-cover rounded-lg"
                                >
                                <button
                                    type="button"
                                    @click="removeImage"
                                    class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600"
                                >
                                    <X class="w-4 h-4" />
                                </button>
                            </div>
                        </div>

                        <!-- Upload Button -->
                        <div v-if="!imagePreview" class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                            <div class="space-y-1 text-center">
                                <Upload class="mx-auto h-12 w-12 text-gray-400" />
                                <div class="flex text-sm text-gray-600">
                                    <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-orange-600 hover:text-orange-500">
                                        <span>Upload a file</span>
                                        <input 
                                            id="image" 
                                            type="file" 
                                            accept="image/*"
                                            @change="handleImageChange"
                                            class="sr-only"
                                        >
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end space-x-4">
                        <Link 
                            :href="route('admin.projects.index')"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50"
                        >
                            Cancel
                        </Link>
                        <button
                            type="submit"
                            :disabled="isSubmitting"
                            class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 disabled:opacity-50"
                        >
                            {{ isSubmitting ? 'Creating...' : 'Create Project' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template> 