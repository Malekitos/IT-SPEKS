<script>
import Welcome from '@/Pages/Welcome.vue';
import { Head } from '@inertiajs/vue3';
import FooterAll from '@/Pages/FooterAll.vue';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export default {
    components: {
    Welcome,
    Head,
    FooterAll,
  },

  data() {
    return {
            jaunumi: [],
            nosaukums_ievade: "",
            attels_ievade: "",
            attels_atrodas: "./images/",
    };
  },
  
  methods: {
        getJaunumi() {
        axios.get('Jaunumi/show').then(response => {
            this.jaunumi = response.data;
        }).catch((error) => {
                        console.log('FAILURE!!', error);
                    });
        },
        handleFileUpload(event) {
        this.attels_ievade = event.target.files[0];
        },
        createJaunumi() {

            let jaunumiData = new FormData();
            
            jaunumiData.append('nosaukums_ievade', this.nosaukums_ievade);
            jaunumiData.append('attels_ievade', this. attels_ievade);
 

            axios.post('Jaunumi/add', jaunumiData, {
                    headers: {
                    'Content-Type': 'multipart/FormData'
                    }
                    }).then(() => {
                        this.izveidots()
                        this.getJaunumi()
                    })
                    .catch((error) => {
                        console.log('FAILURE!!', error);
                    });
        }

    },

    mounted() {
    this.getJaunumi();
  },

    setup() {

    const izveidots = () => {
                toast("Ziņa ir veiksmīgi izveidota!", {
        "theme": "colored",
        "type": "success",
        "transition": "flip",
        "dangerouslyHTMLString": true
        })
    }
    return { izveidots };
    
   }
};
</script>

<template>
    <Head title="Dashboard" />

    <Welcome>
        
<section class="py-20">
<div class="mx-auto w-full max-w-2xl px-6 lg:max-w-7xl">
<div class="flex flex-wrap items-center justify-between gap-x-8 gap-y-3">
<h2 class="text-3xl text-main font-bold sm:text-4xl lg:text-[40px]">Pēdējās ziņas</h2>
            <button v-if="$page.props.auth.user" onclick="Izveidot.showModal()" class="bg-main hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md">
                Pievienot jaunu ziņu
            </button>   

</div>


        <div class="mt-12 grid gap-x-8 gap-y-12 lg:grid-cols-3">

            <div v-for="(jaunums,index) in jaunumi":key="index" class="group relative">
            <div class="aspect-[2/1] w-full rounded-lg bg-gray-100 shadow-card transition group-hover:opacity-80">
                <img :src=attels_atrodas+jaunums.attels alt="Error" class="h-full w-full rounded-lg object-cover" loading="lazy" />
                </div>

                <h3 class="mt-4 text-xl font-bold transition group-hover:text-main sm:text-2xl">
                    {{ jaunums.nosaukums }}
                </h3>

                <a class=" transition duration-300 leading-none focus:outline-none focus-visible:ring-2 focus-visible:ring-main-600/80 absolute inset-0 !block h-full w-full !rounded-lg" href="" onclick>
                <span class="sr-only">Lasīt</span>
                </a>
                </div>



        <dialog id="Rediget" class="modal">
                        <div class="modal-box bg-white">
                            <h3 class="font-bold">Rediģēšana</h3>

                            <section class="bg-white dark:bg-gray-900">
                            <div class="max-w-2xl">
                                <h2 class="mb-4 mt-4 text-xl font-bold text-gray-900 dark:text-white">Šīs ziņas rediģēšana</h2>
                                <form action="#" class="space-y-7">
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Nosaukums</label>
                                    <input type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Ziņas nosaukums" required>
                                </div>
                                
                        
                                <form class="max-w-lg mx-auto">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Lejupielādēt attēlu</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">augšupielādējiet nelielu attēlu Jūsu ziņai.</div>
                                </form>

                         
                                <!-- <button @click="notify" class="btn bg-main border-0 text-white hover:bg-accent">Pieteikties</button> -->

                            </form>
                            </div>
                            </section>
                            <div class="modal-action flex justify-between">
                            <form method="dialog">
                                <button @click="notify" class="btn bg-main border-0 text-white hover:bg-accent">Rediģēt</button>
                            </form>
                            <form method="dialog">
                                <button class="btn border-0 text-white bg-slate-500 hover:bg-slate-600">Aizvērt</button>
                            </form>
                            </div>
                        </div>
            </dialog>

            <dialog id="Izveidot" class="modal">
                        <div class="modal-box bg-white">
                            <h3 class="font-bold">Izveidošana</h3>
                            
                            <section class="bg-white dark:bg-gray-900">
                            <div class="max-w-2xl">
                                <h2 class="mb-4 mt-4 text-xl font-bold text-gray-900 dark:text-white">Jaunas vakances izveide</h2>
                                <form @submit.prevent="createJaunumi" action="#" class="space-y-7">
                                <div>
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nosaukums</label>
                                    <input v-model="nosaukums_ievade" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Ziņas nosaukums" required>
                                </div>
                                <form class="max-w-lg mx-auto">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Lejupielādēt attēlu</label>
                                <input @change="handleFileUpload" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file" required>
                                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">augšupielādējiet nelielu attēlu Jūsu ziņai.</div>
                                </form>

                                <button @click="getJaunumi()"  class="btn bg-main border-0 text-white hover:bg-accent">Izveidot</button>
                            </form>
                            </div>
                            </section>
                        
                           
                            
                        </div>
            </dialog>
</div>

</div>

</section>

    </Welcome>

    <FooterAll></FooterAll>
</template>
