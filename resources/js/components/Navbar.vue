<script setup>
//import { RouterLink, RouterView } from 'vue-router'

import { ref, onMounted, onBeforeUnmount, watch } from 'vue';

const isLargeScreen = ref(window.innerWidth > 768);
const isMobileMenuVisible = ref(false);
const handleResize = () => {
  isLargeScreen.value = window.innerWidth > 768;
};
const toggleMenu = () => {
  isMobileMenuVisible.value = !isMobileMenuVisible.value
}

onMounted(() => {
  window.addEventListener('resize', handleResize);
  window.innerWidth > 768 ? isMobileMenuVisible.value = true : null
});

onBeforeUnmount(() => {
  window.removeEventListener('resize', handleResize);
});

watch(isLargeScreen, (newValue, oldValue) => {
  newValue ? isMobileMenuVisible.value = ref(true) : null
});

</script>


<template>
  <nav class="fixed z-50 top-0 w-full h-20 bg-slate-300 md:flex md:justify-between md:items-center md:px-6">
    <div class="container h-full
       mx-auto px-4 py-2 flex justify-between items-center">
      <img class="h-20 w-20" src="../assets/bjlogo.png" alt="">


      <button type="button" @click="toggleMenu"
        class="bg-slate-200 md:hidden border-4 p-1 border-slate-700 rounded-xl ">
        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
          <path
            d="M160-240q-17 0-28.5-11.5T120-280q0-17 11.5-28.5T160-320h640q17 0 28.5 11.5T840-280q0 17-11.5 28.5T800-240H160Zm0-200q-17 0-28.5-11.5T120-480q0-17 11.5-28.5T160-520h640q17 0 28.5 11.5T840-480q0 17-11.5 28.5T800-440H160Zm0-200q-17 0-28.5-11.5T120-680q0-17 11.5-28.5T160-720h640q17 0 28.5 11.5T840-680q0 17-11.5 28.5T800-640H160Z"
            fill="" />
        </svg>
      </button>
    </div>
    <ul v-show="isMobileMenuVisible" class="md:flex md:relative md:w-auto md:py-0
       bg-slate-300 text-slate-900 absolute w-full left-0 pb-1">
      <li class="mx-4 my-1 md:mx-1">
        <RouterLink activeClass="active"
          class="rounded-full text-center font-semibold block px-4 py-2 hover:bg-gray-400" to="/">Home</RouterLink>
      </li>
      <li class="mx-4 my-1 md:mx-1">
        <RouterLink activeClass="active"
          class="rounded-full text-center font-semibold block px-4 py-2 hover:bg-gray-400" to="/about">About
        </RouterLink>
      </li>
      <li class="mx-4 my-1 md:mx-1">
        <RouterLink activeClass="active"
          class="rounded-full text-center font-semibold block px-4 py-2 hover:bg-gray-400" to="/portfolio">Portfolio
        </RouterLink>
      </li>
      <li class="mx-4 my-1 md:mx-1">
        <RouterLink activeClass="active"
          class="rounded-full text-center font-semibold block px-4 py-2 hover:bg-gray-400" to="/contacts">Contacts
        </RouterLink>
      </li>


    </ul>


  </nav>
  <RouterView />

</template>
