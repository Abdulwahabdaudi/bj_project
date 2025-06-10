<script setup>
import { ref, computed, onMounted, onUnmounted } from 'vue'
import { Carousel, Pagination, Slide } from 'vue3-carousel'
import 'vue3-carousel/dist/carousel.css'
import { Link, usePage } from '@inertiajs/vue3'
import {
    Quote,
    Award,
    Shield,
    Briefcase,
    ChevronDown,
    ChevronUp,
    Phone,
    Mail,
    MapPin,
    ArrowRight,
    Star,
    Users,
    Clock,
    CheckCircle
} from 'lucide-vue-next'
import Navbar from '../components/Navbar.vue';

// Get auth state from Inertia
const auth = computed(() => usePage().props.auth)

// Scroll effect for navbar
const scrollY = ref(0)
const handleScroll = () => {
    scrollY.value = window.scrollY
}

onMounted(() => {
    window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll)
})

// Image imports
const imgUrl = import.meta.glob('../assets/*.jpg', {
    import: 'default',
    eager: true
})


const company = {
    name: "BJ DESIGN AND CONSTRUCTION",
    email: "bjdesigning2020@gmail.com", // Path to your logo
    phone: "+255756420776",

};

// Stats data
const stats = ref([
    { number: '150+', label: 'Miradi Iliyokamilika', icon: CheckCircle },
    { number: '50+', label: 'Wateja Wenye Furaha', icon: Users },
    { number: '10+', label: 'Miaka ya Uzoefu', icon: Clock },
    { number: '5★', label: 'Kiwango cha Huduma', icon: Star }
])

// Accept projects as a prop from Inertia
const props = defineProps({
    projects: {
        type: Array,
        default: () => []
    }
})

// Services data with enhanced information
const services = ref([
    {
        title: 'Ujenzi wa Majengo',
        description: 'Tunajishughulisha na ujenzi wa majengo ya makazi, biashara na viwanda kwa kutumia teknolojia ya kisasa na kufuata viwango vya juu vya ujenzi.',
        image: imgUrl['../assets/construction.jpg'],
        features: [
            'Miundo ya kisasa yenye ubunifu',
            'Matumizi ya teknolojia ya nishati endelevu',
            'Mazingira salama na yanayostahiki',
            'Ujenzi wa hali ya juu unaodumu',
            'Ufuataji wa kanuni za usalama na usimamizi'
        ]
    },
    {
        title: 'Uchoraji wa Ramani',
        description: 'Uchoraji wa ramani ya miradi ya ujenzi kwa usahihi na kufuata mahitaji maalum ya mteja.',
        image: imgUrl['../assets/architect.jpg'],
        features: [
            'Ramani za usanifu wa kisasa',
            'Uchanganuzi wa kina wa mahitaji ya mradi',
            'Uthibitishaji wa viwango vya usalama na ubora'
        ]
    },
    {
        title: 'Makadirio ya Ujenzi (BOQ)',
        description: 'Utoaji wa makadirio sahihi ya gharama za ujenzi, vifaa, na rasilimali kwa mujibu wa ramani na mahitaji ya mradi.',
        image: imgUrl['../assets/boq.jpg'],
        features: [
            'Uchambuzi wa gharama kwa kina',
            'Orodha kamili ya vifaa na bei zake (Bill of Quantities)',
            'Uhakikishi wa bajeti inayolingana na matarajio'
        ]
    }
])

// Enhanced customer testimonials
const comments = ref([
    {
        comment: 'Huduma zenu ni bora sana. Mradi wetu ulikamilika kwa wakati na kwa ubora wa hali ya juu. Asanteni sana!',
        name: 'Dkt. James Mwangi',
        position: 'Mkurugenzi wa Kampuni',
        rating: 5,
        project: 'Ujenzi wa Makao Makuu'
    },
    {
        comment: 'Timu yenu ni ya kitaaluma na ina uzoefu mkuu. Tunapendekeza kwa mtu yeyote anayetaka huduma bora za ujenzi.',
        name: 'Bi. Sarah Kimani',
        position: 'Mwenyeji wa Nyumba',
        rating: 5,
        project: 'Ujenzi wa Nyumba ya Kibinafsi'
    },
    {
        comment: 'Kazi nzuri sana! Walikamilisha mradi kabla ya muda uliopangwa na gharama ilikuwa chini ya bajeti.',
        name: 'Mh. Ahmed Hassan',
        position: 'Mwenye Biashara',
        rating: 5,
        project: 'Ujenzi wa Duka la Biashara'
    }
])

// FAQ Section
const faqs = ref([
    {
        question: 'Gharama za Ramani ya nyumba na B.O.Q ni kiasi gani?',
        answer: 'Gharama za kuchora Ramani na kufanya makadirio ya gharama za ujenzi mpaka unakamilika unategemea na ukubwa wa nyumba. Kwa maelezo zaidi wasiliana nasi kwa njia ya simu au Chati nasi kwenye mtandao wa Whatsapp.',
        isOpen: false
    },
    {
        question: 'Ujenzi unachukua muda gani kukamilika?',
        answer: 'Muda wa kukamilika ujenzi unategemea na ukubwa wa jengo. Ujenzi hukamilika ndani ya miezi mitatu (3) hadi sita (6) kwa mjengo wa kawaida.',
        isOpen: false
    },
    {
        question: 'Mnatoa Ushauri kuhusu ujenzi wa nyumba kulingana na bajeti ya mteja?',
        answer: 'NDIO, tuna huduma ya kuongea na mteja na kumpa ushauri kuhusu ni nyumba gani anaweza kujenga kulingana na bajeti aliyo andaa.',
        isOpen: false
    },
    {
        question: 'Mnafanya huduma ya usimamizi wa eneo la ujenzi (site)?',
        answer: 'NDIO, tuna huduma ya kukagua na kusimamia eneo la ujenzi kwa gharama ya mteja, pia tuna huduma ya kusimamia ujenzi unao endelea mpaka utakapo kamilika kwa makubaliano maalum na mteja.',
        isOpen: false
    },
    {
        question: 'Je, mnatoa huduma za uongozi wa mradi?',
        answer: 'Ndio, tunatoa huduma kamili za uongozi wa mradi kuanzia mchoro wa awali hadi ukamilishaji wa mradi. Timu yetu ya wataalamu inasimamia kila hatua ya mradi.',
        isOpen: false
    },
    {
        question: 'Ni muda gani mnatumia kukamilisha mradi wa kawaida?',
        answer: 'Muda wa kukamilisha mradi unategemea ukubwa na changamoto za mradi. Kwa kawaida, nyumba za kibinafsi zinachukua miezi 6-12, wakati majengo ya biashara yanaweza kuchukua miezi 12-24.',
        isOpen: false
    },
    {
        question: 'Je, mnatoa dhamana kwa kazi zenu?',
        answer: 'Ndio, tunatoa dhamana ya miaka 2 kwa kazi zetu zote. Pia tunatoa huduma za baadaye za matengenezo na ukarabati.',
        isOpen: false
    },
    {
        question: 'Je, mnaweza kusaidia katika kupata vibali vya ujenzi?',
        answer: 'Ndio, tunatoa msaada katika kupata vibali vyote vinavyohitajika vya ujenzi na kuhakikisha mradi wako unafuata sheria za ujenzi.',
        isOpen: false
    },
    {
        question: 'Ni gharama gani ya huduma zenu?',
        answer: 'Gharama ya huduma zetu inategemea ukubwa na changamoto za mradi. Tunatoa makadirio ya gharama baada ya kukagua mahitaji ya mradi wako.',
        isOpen: false
    },
    {
        question: 'Je, mnatumia vifaa vya ubora gani?',
        answer: 'Tunatumia vifaa vya ubora wa hali ya juu kutoka kwa wasambazaji wanaoaminika. Vifaa vyote vinakaguliwa kwa ubora kabla ya kutumika.',
        isOpen: false
    }
])

// Projects filtering
const categories = ref(['Yote', 'Imekamilika', 'Haijakamilika'])
const activeCategory = ref('Yote')

const filterBtn = (Category) => {
    activeCategory.value = Category
}

const filterProjects = computed(() => {
    if (activeCategory.value === 'Yote') {
        return props.projects
    }
    return props.projects.filter((project) => project.status === activeCategory.value)
})

// FAQ toggle function
const toggleFaq = (index) => {
    faqs.value[index].isOpen = !faqs.value[index].isOpen
}
</script>

<template>
    <div class="bg-slate-50 min-h-screen">


        <!-- Floating Contact Bar - Place after opening <div class="bg-slate-50 min-h-screen"> -->
        <div class="fixed top-0 left-0 right-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    class="flex justify-between items-center py-2 px-6 bg-white/95 backdrop-blur-lg rounded-b-3xl shadow-lg border border-gray-200/30 hover:shadow-xl transition-all duration-300">
                    <!-- Logo with animated hover effect -->
                    <Link href="/" class="flex items-center group">
                    <div class="rounded-xl group-hover:rotate-6 transition-transform duration-300">

                        <div class="rounded-xl group-hover:rotate-6 transition-transform duration-300">
                            <img src="../assets/LOGO.png" :alt="`${company.name} Logo`"
                                class="h-10 w-auto object-contain">
                        </div>

                    </div>
                    <span
                        class="ml-3 text-xl font-bold bg-gradient-to-r from-orange-600 to-orange-400 bg-clip-text text-transparent">{{
                            company.name }}</span>
                    </Link>

                    <!-- Contact Buttons with pulse animation -->
                    <div class="flex items-center space-x-3">
                        <!-- WhatsApp with floating animation -->
                        <a href="https://wa.me/255627420776"
                            class="relative p-2 bg-green-500 hover:bg-green-600 rounded-full shadow-md hover:shadow-lg transition-all duration-300 group"
                            aria-label="Chat on WhatsApp">
                            <Phone class="h-5 w-5 text-white" />
                            <span class="absolute -top-1 -right-1 flex h-5 w-5">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span
                                    class="relative inline-flex rounded-full h-5 w-5 bg-green-600 text-xs text-white items-center justify-center font-bold">!</span>
                            </span>
                        </a>

                        <!-- Call button with ring animation -->
                        <a href="tel:+255756420776"
                            class="p-2 bg-blue-500 hover:bg-blue-600 rounded-full shadow-md hover:shadow-lg transition-all duration-300 animate-soft-ring"
                            aria-label="Call us">
                            <Phone class="h-5 w-5 text-white" />
                        </a>

                        <!-- Phone number with hover effect -->
                        <div class="hidden md:block">
                            <a href="tel:+255756420776" class="flex items-center space-x-2 group">
                                <div
                                    class="flex items-center justify-center h-9 w-9 rounded-full bg-orange-100 group-hover:bg-orange-200 transition-all duration-300 group-hover:rotate-12">
                                    <Phone class="h-5 w-5 text-orange-600" />
                                </div>
                                <div class="text-left">
                                    <p class="text-xs font-medium text-gray-500">Call Us Now</p>
                                    <p
                                        class="text-sm font-bold text-slate-800 group-hover:text-orange-600 transition-colors duration-300">
                                        +255 756 420 776</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Hero Section with Modern Design -->
        <section class="relative overflow-hidden">
            <!-- Background with Gradient Overlay -->
            <div class="absolute inset-0">
                <img src="../assets/bgcover.png" alt="Picha ya Nyuma" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-slate-800/70 to-orange-900/60">
                </div>
            </div>

            <!-- Content -->
            <div class="relative min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-4xl mx-auto space-y-8">
                    <!-- Badge -->
                    <div
                        class="inline-flex items-center px-4 py-2 rounded-full bg-orange-500/20 backdrop-blur-sm border border-orange-500/30">
                        <span class="text-orange-300 font-medium text-sm">KAMPUNI BORA YA UJENZI TANZANIA</span>
                    </div>

                    <!-- Main Heading -->
                    <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold text-white leading-tight">
                        Jenga kwa
                        <span class="bg-gradient-to-r from-orange-400 to-orange-600 bg-clip-text text-transparent">
                            Ujasiri
                        </span>
                    </h1>

                    <!-- Description -->
                    <p class="text-xl md:text-2xl text-slate-200 max-w-3xl mx-auto leading-relaxed">
                        {{ company.name }}, tunafanya maono yako ya ujenzi kuwa kweli kwa kutumia
                        teknolojia ya kisasa na uzoefu wa miaka mingi.
                    </p>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center pt-8">
                        <button
                            class="group px-8 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold rounded-full hover:from-orange-600 hover:to-orange-700 transform hover:scale-105 transition-all duration-300 flex items-center gap-2">
                            Anza Mradi Wako
                            <ArrowRight class="w-5 h-5 group-hover:translate-x-1 transition-transform" />
                        </button>
                        <button
                            class="px-8 py-4 border-2 border-white/30 text-white font-bold rounded-full hover:bg-white/10 backdrop-blur-sm transition-all duration-300">
                            Ona Miradi Yetu
                        </button>
                    </div>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                <ChevronDown class="w-8 h-8 text-white/60" />
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div v-for="(stat, index) in stats" :key="index" class="text-center group">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl mb-4 group-hover:scale-110 transition-transform duration-300">
                            <component :is="stat.icon" class="w-8 h-8 text-white" />
                        </div>
                        <div class="text-3xl md:text-4xl font-bold text-slate-800 mb-2">{{ stat.number }}</div>
                        <div class="text-slate-600 font-medium">{{ stat.label }}</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section with Modern Cards -->
        <section class="py-20 bg-slate-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-slate-800 mb-6">
                        Huduma
                        <span
                            class="bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent">Zetu</span>
                    </h2>
                    <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                        Tunatoa huduma za kiwango cha kimataifa zinazokidhi mahitaji ya wateja wetu
                        katika sekta Ujenzi wa Majengo, Biashara na Viwanda.
                    </p>
                </div>

                <!-- Services Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="(service, index) in services" :key="index" class="group">
                        <div
                            class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                            <!-- Image -->
                            <div class="relative overflow-hidden h-64">
                                <img :src="service.image" :alt="service.title"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            </div>

                            <!-- Content -->
                            <div class="p-8">
                                <h3 class="text-2xl font-bold text-slate-800 mb-4">{{ service.title }}</h3>
                                <p class="text-slate-600 mb-6 leading-relaxed">{{ service.description }}</p>

                                <!-- Features -->
                                <ul class="space-y-2 mb-6">
                                    <li v-for="feature in service.features" :key="feature"
                                        class="flex items-center gap-2 text-slate-600">
                                        <CheckCircle class="w-5 h-5 text-green-500" />
                                        {{ feature }}
                                    </li>
                                </ul>

                                <button
                                    class="w-full py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold rounded-full hover:from-orange-600 hover:to-orange-700 transition-all duration-300 flex items-center justify-center gap-2">
                                    Soma Zaidi
                                    <ArrowRight class="w-5 h-5" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-slate-800 mb-6">
                        Miradi
                        <span
                            class="bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent">Yetu</span>
                    </h2>
                    <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                        Tazama baadhi ya miradi tuliyoifanya kwa mafanikio. Kila mradi ni ushahidi wa
                        ubora wetu na uzoefu wa miaka mingi.
                    </p>
                </div>

                <!-- Filter Buttons -->
                <div class="flex flex-wrap justify-center gap-4 mb-12">
                    <button v-for="(category, index) in categories" :key="index" @click="filterBtn(category)" :class="{
                        'bg-gradient-to-r from-orange-500 to-orange-600 text-white': category === activeCategory,
                        'bg-white text-slate-600 hover:bg-slate-50': category !== activeCategory
                    }" class="px-6 py-3 rounded-full font-bold border-2 border-orange-500 transition-all duration-300">
                        {{ category }}
                    </button>
                </div>

                <!-- Projects Grid -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="(project, index) in filterProjects" :key="index" class="group">
                        <div
                            class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                            <!-- Image -->
                            <div class="relative overflow-hidden h-64">
                                <img :src="`/storage/${project.image}`" :alt="project.title"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                <div class="absolute top-4 left-4">
                                    <span :class="{
                                        'bg-green-500': project.status === 'Imekamilika',
                                        'bg-yellow-500': project.status === 'Haijakamilika'
                                    }" class="px-3 py-1 rounded-full text-white text-sm font-bold">
                                        {{ project.status }}
                                    </span>
                              
                              
                              
                          </div>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                                <div
                                    class="absolute bottom-4 left-4 right-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <p class="text-sm mb-2">{{ project.description }}</p>
                                    <div class="flex items-center gap-2 text-xs">
                                        <Clock class="w-4 h-4" />
                                        {{ project.duration }}
                                    </div>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-slate-800 mb-2">{{ project.title }}</h3>
                                <p class="text-slate-600 mb-4 flex items-center gap-2">
                                    <MapPin class="w-4 h-4" />
                                    {{ project.place }}
                                </p>
                                <button
                                    class="w-full py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold rounded-full hover:from-orange-600 hover:to-orange-700 transition-all duration-300">
                                    Ona Zaidi
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section class="py-20 bg-gradient-to-br from-slate-800 to-slate-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                        Kwa Nini Kutuchagua?
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div
                        class="bg-white/10 backdrop-blur-sm border border-white/20 p-8 rounded-3xl hover:bg-white/20 transition-all duration-300 group">
                        <Briefcase
                            class="w-16 h-16 text-orange-400 mb-6 group-hover:scale-110 transition-transform duration-300" />
                        <h3 class="text-2xl font-bold text-white mb-4">Uzoefu Unaoweza Kuamini</h3>
                        <p class="text-slate-300 leading-relaxed">
                            Kwa miaka ya uzoefu katika ujenzi wa makazi na biashara, timu yetu yenye ujuzi
                            inaleta maarifa na ufundi usio na kifani kwa kila mradi.
                        </p>
                    </div>

                    <div
                        class="bg-white/10 backdrop-blur-sm border border-white/20 p-8 rounded-3xl hover:bg-white/20 transition-all duration-300 group">
                        <Shield
                            class="w-16 h-16 text-orange-400 mb-6 group-hover:scale-110 transition-transform duration-300" />
                        <h3 class="text-2xl font-bold text-white mb-4">Mahusiano Mazuri na Wateja</h3>
                        <p class="text-slate-300 leading-relaxed">
                            Sifa yetu imejengwa kwa msingi wa uaminifu na kuridhika kwa wateja.
                            Tunajali mahusiano yetu na kila mteja.
                        </p>
                    </div>

                    <div
                        class="bg-white/10 backdrop-blur-sm border border-white/20 p-8 rounded-3xl hover:bg-white/20 transition-all duration-300 group">
                        <Award
                            class="w-16 h-16 text-orange-400 mb-6 group-hover:scale-110 transition-transform duration-300" />
                        <h3 class="text-2xl font-bold text-white mb-4">Jitihada za Ubora</h3>
                        <p class="text-slate-300 leading-relaxed">
                            Tunajivunia kutoa miradi inayokidhi viwango vya juu zaidi vya ubora na usalama.
                            Ubora ni msingi wa kila kitu tunachofanya.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-20 bg-slate-50">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-slate-800 mb-6">
                        Maswali Yanayoulizwa
                        <span class="bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent">Mara
                            Kwa Mara</span>
                    </h2>
                    <p class="text-xl text-slate-600">
                        Jibu la maswali yako yanaweza kuwa hapa. Ikiwa hujapata jibu, tafadhali tupigie simu.
                    </p>
                </div>

                <div class="space-y-4">
                    <div v-for="(faq, index) in faqs" :key="index"
                        class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <button @click="toggleFaq(index)"
                            class="w-full px-8 py-6 text-left flex items-center justify-between hover:bg-slate-50 transition-colors duration-200">
                            <h3 class="text-lg font-bold text-slate-800 pr-4">{{ faq.question }}</h3>
                            <ChevronDown :class="{ 'rotate-180': faq.isOpen }"
                                class="w-6 h-6 text-orange-500 transition-transform duration-200 flex-shrink-0" />
                        </button>

                        <div v-if="faq.isOpen" class="px-8 pb-6">
                            <div class="border-t border-slate-200 pt-6">
                                <p class="text-slate-600 leading-relaxed">{{ faq.answer }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-slate-800 mb-6">
                        Wateja Wetu
                        <span
                            class="bg-gradient-to-r from-orange-500 to-orange-600 bg-clip-text text-transparent">Wanasema
                            Nini?</span>
                    </h2>
                </div>

                <Carousel :autoplay="5000" :wrap-around="true" :transition="1000" class="max-w-4xl mx-auto">
                    <Slide v-for="(comment, index) in comments" :key="index">
                        <div class="px-8">
                            <div class="bg-slate-50 rounded-3xl p-8 md:p-12 text-center">
                                <!-- Stars -->
                                <div class="flex justify-center mb-6">
                                    <Star v-for="n in comment.rating" :key="n"
                                        class="w-6 h-6 text-yellow-400 fill-current" />
                                </div>

                                <!-- Quote -->
                                <div class="flex justify-center items-start gap-4 mb-8">
                                    <Quote class="w-8 h-8 text-orange-500 flex-shrink-0 mt-1" />
                                    <p class="text-xl md:text-2xl text-slate-700 italic leading-relaxed">
                                        {{ comment.comment }}
                                    </p>
                                    <Quote class="w-8 h-8 text-orange-500 flex-shrink-0 mt-1 rotate-180" />
                                </div>

                                <!-- Author -->
                                <div>
                                    <h4 class="text-xl font-bold text-slate-800 mb-2">{{ comment.name }}</h4>
                                    <p class="text-slate-600 mb-2">{{ comment.position }}</p>
                                    <p class="text-sm text-orange-600 font-medium">{{ comment.project }}</p>
                                </div>
                            </div>
                        </div>
                    </Slide>
                </Carousel>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-slate-900 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Contact Info -->
                    <div class="lg:col-span-2">
                        <h3 class="text-2xl font-bold mb-6 text-orange-400">{{ company.name }}</h3>
                        <p class="text-slate-300 mb-6 leading-relaxed">
                            Kampuni bora ya ujenzi nchini Tanzania. Tunafanya maono yako ya ujenzi kuwa kweli
                            kwa kutumia teknolojia ya kisasa na uzoefu wa miaka mingi.
                        </p>

                        <div class="space-y-4">
                            <div class="flex items-center gap-3">
                                <Phone class="w-5 h-5 text-orange-400" />
                                <span>{{ company.phone }}</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <Mail class="w-5 h-5 text-orange-400" />
                                <span>{{ company.email }}</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <MapPin class="w-5 h-5 text-orange-400 mt-1" />
                                <span>Dar es Salaam<br>Ubungo Street</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h4 class="text-lg font-bold mb-6 text-orange-400">Viunganisho Muhimu</h4>
                        <ul class="space-y-3">
                            <li><a href="#" class="text-slate-300 hover:text-orange-400 transition-colors">Kuhusu</a>
                            </li>
                            <li><a href="#" class="text-slate-300 hover:text-orange-400 transition-colors">Miradi</a>
                            </li>
                            <li><a href="#" class="text-slate-300 hover:text-orange-400 transition-colors">Huduma</a>
                            </li>
                            <li><a href="#"
                                    class="text-slate-300 hover:text-orange-400 transition-colors">Mawasiliano</a></li>
                        </ul>
                    </div>

                    <!-- Account Links -->
                    <div>
                        <h4 class="text-lg font-bold mb-6 text-orange-400">Akaunti</h4>
                        <div class="space-y-3">
                            <template v-if="auth.user">
                                <Link :href="route('dashboard')"
                                    class="block text-slate-300 hover:text-orange-400 transition-colors">
                                Dashboard
                                </Link>
                                <Link :href="route('logout')" method="post" as="button"
                                    class="block text-slate-300 hover:text-orange-400 transition-colors">
                                logout
                                </Link>
                            </template>
                            <template v-else>
                                <Link :href="route('login')"
                                    class="block text-slate-300 hover:text-orange-400 transition-colors">
                                login
                                </Link>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Bottom Bar -->
                <div class="border-t border-slate-700 mt-12 pt-8 text-center">
                    <p class="text-slate-400">
                        © {{ new Date().getFullYear() }} {{ company.name }}. All right reserved
                    </p>

                </div>
                <div class="text-center text-slate-400 mt-10">
                    <p class="text-sm">
                        DEVELOPED AND MAINTAINED BY
                        <span class="font-medium text-orange-400">ABDUL</span> •
                        <a href="tel:+255655373215" class="hover:text-orange-400 transition-colors ml-1">
                            +255 655 373 215
                        </a>
                    </p>
                    <p class="text-xs mt-1">
                        Need technical support? Call or WhatsApp for assistance
                    </p>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>
/* Enhanced animations and transitions */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 1s, transform 0.3s;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: translateY(20px);
}

/* Gradient text effects */
.gradient {
    background: linear-gradient(135deg, #f59e0b, #ea580c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

/* Modern glassmorphism effects */
.glass {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

/* Hover animations */
.hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
}

/* Custom carousel styles */
:deep(.carousel__pagination-button) {
    background-color: #cbd5e1;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    transition: all 0.3s ease;
}

:deep(.carousel__pagination-button--active) {
    background-color: #ea580c;
    transform: scale(1.2);
}

:deep(.carousel__prev),
:deep(.carousel__next) {
    background-color: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #ea580c;
    transition: all 0.3s ease;
}

:deep(.carousel__prev):hover,
:deep(.carousel__next):hover {
    background-color: rgba(234, 88, 12, 0.1);
    transform: scale(1.1);
}

/* Scroll animations */
@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-slide-up {
    animation: slideInUp 0.6s ease-out forwards;
}

/* Button hover effects */
.btn-primary {
    background: linear-gradient(135deg, #ea580c, #dc2626);
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(234, 88, 12, 0.3);
}

/* Card hover effects */
.card-hover {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.card-hover:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
}

/* Text reveal animation */
.text-reveal {
    background: linear-gradient(90deg, transparent 0%, #000 50%, transparent 100%);
    background-size: 200% 100%;
    -webkit-background-clip: text;
    background-clip: text;
    animation: textReveal 2s ease-in-out infinite;
}

@keyframes textReveal {

    0%,
    100% {
        background-position: -200% 0;
    }

    50% {
        background-position: 200% 0;
    }
}

/* Responsive improvements */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
        line-height: 1.2;
    }

    .hero-subtitle {
        font-size: 1.125rem;
    }
}

/* Loading skeleton */
.skeleton {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: loading 1.5s infinite;
}

@keyframes loading {
    0% {
        background-position: 200% 0;
    }

    100% {
        background-position: -200% 0;
    }
}

/* Enhanced focus states for accessibility */
button:focus,
a:focus {
    outline: 2px solid #ea580c;
    outline-offset: 2px;
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f5f9;
}

::-webkit-scrollbar-thumb {
    background: #ea580c;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #dc2626;
}

.animate-soft-ring {
    animation: softRing 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes softRing {

    0%,
    100% {
        box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7);
    }

    50% {
        box-shadow: 0 0 0 10px rgba(59, 130, 246, 0);
    }
}
</style>