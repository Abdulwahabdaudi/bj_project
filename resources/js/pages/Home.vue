<script setup>
import { ref, computed } from 'vue'
import { Carousel, Pagination, Slide } from 'vue3-carousel'
import 'vue3-carousel/dist/carousel.css'
import Quote from '../components/icons/Quote.vue'
import Certified from '../components/icons/Certified.vue'
import Trust from '../components/icons/Trust.vue'
import Job from '../components/icons/Job.vue'

// Image imports
const imgUrl = import.meta.glob('../assets/*.jpg', {
    import: 'default',
    eager: true
})

// Projects data
const projects = ref([
    {
        id: 1,
        status: 'Completed',
        title: 'House construction',
        place: 'Arusha Plot 201',
        description: 'From custom homes to remodeling, we create spaces that feel like home.',
        image: imgUrl[`../assets/c1.jpg`]
    },
    {
        id: 2,
        status: 'Completed',
        title: 'House construction',
        place: 'Arusha Plot 201',
        description: ' We help businesses grow by designing and constructing efficient, modern spaces.',
        image: imgUrl[`../assets/landingCover.jpg`]
    },
    {
        id: 3,
        status: 'InCompleted',
        title: 'House construction',
        place: 'Arusha Plot 201',
        description: 'Ensuring seamless coordination and timely completion.',
        image: imgUrl[`../assets/landingCover.jpg`]
    },
    {
        id: 4,
        status: 'InCompleted',
        title: 'House construction',
        place: 'Arusha Plot 201',
        description: 'Ensuring seamless coordination and timely completion.',
        image: imgUrl[`../assets/landingCover.jpg`]
    },
    {
        id: 5,
        status: 'InCompleted',
        title: 'House construction',
        place: 'Arusha Plot 201',
        description: 'Ensuring seamless coordination and timely completion.',
        image: imgUrl[`../assets/landingCover.jpg`]
    },
    {
        id: 6,
        status: 'InCompleted',
        title: 'House construction',
        place: 'Arusha Plot 201',
        description: 'Ensuring seamless coordination and timely completion.',
        image: imgUrl[`../assets/landingCover.jpg`]
    },
])

// Services data
const services = ref([
    {
        title: 'Residential Construction',
        description: 'From custom homes to remodeling, we create spaces that feel like home.',
        image: imgUrl[`../assets/c1.jpg`]
    },
    {
        title: 'Commercial Projects',
        description: ' We help businesses grow by designing and constructing efficient, modern spaces.',
        image: imgUrl[`../assets/landingCover.jpg`]
    },
    {
        title: 'Project Management',
        description: 'Ensuring seamless coordination and timely completion.',
        image: imgUrl[`../assets/landingCover.jpg`]
    },
])

// Customer testimonials
const comments = [
    {
        comment: 'YOU services are excellent',
        name: 'customer 1',
        position: 'customer'
    },
    {
        comment: 'YOU services are excellent',
        name: 'customer 2',
        position: 'customer'
    },
    {
        comment: 'YOU services are excellent',
        name: 'customer 3',
        position: 'customer'
    },
]

// Projects filtering
const categories = ref(['All', 'Completed', 'InCompleted'])
const activeCategory = ref('All')
const filterBtn = (Category) => {
    activeCategory.value = Category
}
const filterProjects = computed(() => {
    if (activeCategory.value === 'All') {
        return projects.value
    }
    return projects.value.filter((project) => project.status === activeCategory.value)
})
</script>

<template>
  <div class="bg-slate-100">
    <!-- Landing Section -->
    <section class="bg-[url('../assets/c1.jpg')] bg-no-repeat bg-cover bg-slate-700 bg-blend-darken md:h-[35rem] md:grid md:grid-cols-2 mt-20 p-5 w-full lg:mb-32">
        <div class="relative text-center my-auto px-10">
            <h4 class="text-slate-100 font-medium lg:text-left">YOU ARE IN RIGHT PLACE</h4>
            <h1 class="font-['Noto Serif'] font-bold text-gold py-4 text-5xl lg:text-left">Build with Confidence</h1>
            <p class="text-white text-xl py-3 lg:text-left">
                At Acontractors, we bring your construction vision to life.
                Whether it's residential, commercial, or industrial projects.
            </p>
            <button class="lg:text-left my-5 px-6 py-3 rounded-full bg-gold font-bold text-gray-600 hover:text-black">
                Contacts us
            </button>
        </div>

        <div class="bg-gold hidden lg:inline absolute -bottom-16 left-20 right-20">
            <h1 class="font-['Noto Serif'] font-bold text-slate-700 text-center py-4 text-4xl">WELCOME</h1>
            <div class="w-full flex items-center justify-center p-0 m-0">
                <img class="h-20 w-20" src="../assets/hand.png" alt="">
            </div>
            <p class="text-slate-700 font-bold text-xl text-center mb-2 pb-3">
                At our Company, we are committed to your mission. Our goal is to provide services that meet you need.
            </p>
        </div>
    </section>

    <!-- Services Section -->
    <div>
        <div class="flex m-4">
            <h1 class="mx-auto py-1 px-2 rounded-xl font-bold text-slate-800 text-3xl border-b-4 gradient">Our Services</h1>
        </div>

        <h2 class="m-2 p-2 block text-center text-slate-700 font-bold">
            At AContractor construction, we offer a range of construction services that target sectors such as
            industrials, commercials, and residentials. We provide services that meet our client's goals. With the aim
            to be the best construction company in Tanzania, our team gives their best to deliver the best results.
        </h2>

        <div class="card md:flex items-center justify-center md:gap-10 p-1 grid">
            <div v-for="(service, index) in services" :key="index" class="card sm:w-60 m-2 mb-3 bg-slate-200 min-w-56">
                <div class="relative z-0 min-w-10">
                    <img class="h-full w-full rounded-t-md" :src="service.image" :alt="service.image" width="10" height="10">
                    <h1 class="my-1 w-full font-bold text-xl text-slate-900 text-center">{{ service.title }}</h1>
                    <p class="absolute top-0 left-0 opacity-0 hover:opacity-100 hover:text-gold text-lg font-bold bg-gradient-to-b from-[rgba(0,0,0,0.8)] to-transparent bg-opacity-70 p-2 h-full text-center flex justify-center items-center">
                        {{ service.description }}
                    </p>
                </div>

                <div class="flex">
                    <button class="mx-auto w-11/12 p-2 m-3 hover:bg-gold hover:text-slate-50 text-slate-800 font-bold rounded-full border-2 border-lime-800">
                        Read more...
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Projects Section -->
    <div class="p-2">
        <div class="flex m-4">
            <h1 class="mx-auto py-1 px-2 rounded-xl font-bold text-slate-800 text-3xl border-b-4 gradient">Our Projects</h1>
        </div>

        <h2 class="m-2 p-2 block text-center text-slate-700 font-bold">
            Our team has a diversity of experience over the last couple of years, having proudly executed commercial,
            residential, and industrial projects within the region. The quality of our work speaks for itself, This is
            why we are the best Construction Firm in Tanzania.
        </h2>

        <div class="flex gap-4 justify-center p-2">
            <div v-for="(category, index) in categories" :key="index">
                <button @click="filterBtn(category)" :class="{ active: category === activeCategory }"
                    class="px-0 mx-2 font-bold">{{ category }}</button>
            </div>
        </div>

        <div class="card m-2 p-2 grid gap-2 sm:grid-cols-2 lg:grid-cols-3 place-items-center">
            <div v-for="(project, index) in filterProjects" :key="index" class="m-2 mb-3 bg-slate-200">
                <div class="relative z-0 min-w-10">
                    <img class="object-cover h-[30rem]" :src="project.image" :alt="project.image">
                    <div class="h-full w-full absolute bottom-0 left-0 opacity-0 hover:opacity-100 hover:text-slate-900 flex">
                        <div class="flex flex-col mt-auto mb-28 mx-5 bg-[rgba(255,255,255,0.2)] w-full p-5 rounded-xl">
                            <h1 class="text-2xl font-bold bg-opacity-70 text-start">{{ project.title }}</h1>
                            <p class="text-lg font-bold italic bg-opacity-70 text-start">{{ project.place }}</p>
                            <button class="w-11/12 p-2 my-3 hover:bg-gold hover:text-slate-50 text-slate-800 font-bold rounded-full border-2 border-lime-800">
                                Read more...
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Preferred Section -->
    <div class="bg-gold font-bold text-lime-900 mt-8 py-5 w-full divide-gray-500">
        <h1 class="font-bold text-slate-600 p-4 text-4xl text-center">Why choose us?</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 place-items-stretch p-4 mx-5 gap-7">
            <div class="border-slate-100 border-2 p-5 rounded-xl">
                <Job class="flex justify-center"></Job>
                <h3 class="text-center text-xl text-slate-700">Expertise You Can Trust</h3>
                <p class="text-center">With years of experience in residential and commercial construction, our skilled team brings unparalleled knowledge and craftsmanship to every project.</p>
            </div>

            <div class="border-slate-100 border-2 p-5 rounded-xl">
                <Trust class="flex justify-center"></Trust>
                <h3 class="text-center text-xl text-slate-700">Strong Client Relationships</h3>
                <p class="text-center">Our reputation is built on trust and client satisfaction</p>
            </div>

            <div class="border-slate-100 border-2 p-5 rounded-xl">
                <Certified class="flex justify-center"></Certified>
                <h3 class="text-center text-xl text-slate-700">Commitment to Excellence</h3>
                <p class="text-center">We take pride in delivering projects that meet the highest standards of quality and safety.</p>
            </div>
        </div>
    </div>

    <!-- Customer Response Section -->
    <div class="text-center p-5">
        <h1 class="font-bold text-2xl text-slate-700 mb-5">WHAT OUR CUSTOMER SAY?</h1>

        <Carousel :autoplay="3000" :wrap-around="true" :transition="800">
            <Slide v-for="comment in comments" :key="comment">
                <div>
                    <div class="flex justify-center">
                        <Quote></Quote>
                        <p class="text-slate-800 italic font-bold py-1">{{ comment.comment }}</p>
                        <Quote></Quote>
                    </div>
                    <h4 class="font-bold text-slate-900 p-2">{{ comment.name }}</h4>
                    <h6 class="text-slate-500">{{ comment.position }}</h6>
                </div>
            </Slide>
        </Carousel>
    </div>

    <!-- Footer Section -->
    <div class="bg-gold font-bold text-lime-900 mt-8 py-5 w-full divide-y-2 divide-gray-500">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 place-items-stretch p-4 ms-10">
            <div>
                <div class="py-3">
                    <h1 class="font-bold text-xl p-1">CONTACT INFO</h1>
                    <div class="line w-32 ml-2"></div>
                </div>
                <div class="m-3">
                    <h3>Phone: +255 123456789</h3>
                    <h3>Email: acontractor@gmail.com</h3>
                </div>
            </div>

            <div>
                <div class="py-3">
                    <h1 class="font-bold text-xl p-1">LOCATION</h1>
                    <div class="line w-24 ml-2"></div>
                </div>
                <div class="m-3">
                    <h4>Dar es salaam Ubungo street Plot No. 22</h4>
                </div>
            </div>

            <div>
                <div class="py-3">
                    <h1 class="font-bold text-xl p-1">IMPORTANT LINKS</h1>
                    <div class="line w-44 ml-2"></div>
                </div>
                <div class="m-3">
                    <h5 class="mb-1">About</h5>
                    <h5 class="mb-1">Project</h5>
                    <h5 class="mb-1">Services</h5>
                    <h5 class="mb-1">Contacts</h5>
                </div>
            </div>
        </div>

        <div class="text-center pt-3">
            2024 @AContractor. All right reserved
        </div>
    </div>
  </div>
</template>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 1s, transform 3s;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: translateX(5);
}
</style>
