import { defineStore } from 'pinia'
import { ref, computed } from 'vue'
import axios from 'axios'

export const useAuthStore = defineStore('auth', () => {
    const user = ref(null)
    const token = ref(localStorage.getItem('token'))

    const isAuthenticated = computed(() => !!token.value)

    // Login method
    const login = async (credentials) => {
        try {
            const response = await axios.post('/api/login', credentials)
            token.value = response.data.token
            user.value = response.data.user
            localStorage.setItem('token', token.value)
            return true
        } catch (error) {
            console.error('Login failed:', error)
            return false
        }
    }

    // Logout method
    const logout = async () => {
        try {
            await axios.post('/api/logout')
            token.value = null
            user.value = null
            localStorage.removeItem('token')
        } catch (error) {
            console.error('Logout failed:', error)
        }
    }

    // Check authentication status
    const checkAuth = async () => {
        if (!token.value) return false

        try {
            const response = await axios.get('/api/user')
            user.value = response.data
            return true
        } catch (error) {
            token.value = null
            user.value = null
            localStorage.removeItem('token')
            return false
        }
    }

    return {
        user,
        token,
        isAuthenticated,
        login,
        logout,
        checkAuth
    }
}) 