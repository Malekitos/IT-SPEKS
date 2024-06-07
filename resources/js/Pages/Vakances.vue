<!-- <script setup>
import Welcome from '@/Pages/Welcome.vue';
import { Head } from '@inertiajs/vue3';
import FooterAll from '@/Pages/FooterAll.vue';
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";
import { ref } from 'vue';
import Modal from '../Components/Modal.vue';

import Crudvakances from './Crudvakances.vue';

const notify = () => {
    toast("Jūsu darbība veiksmīgi pabeigta!", {
  "theme": "auto",
  "type": "success",
  "dangerouslyHTMLString": true
});
  return { notify };
};
    
const isModalVisibleDzest = ref(false);
const openModalDzest = () => {
  isModalVisibleDzest.value = true;
};

const closeModalDzest = () => {
    isModalVisibleDzest.value = false;
};

const emits = defineEmits(['submit']);

const nosaukums_ievade = ref('');
const iss_apraksts_ievade = ref('');
const alga_ievade = ref('');
const atrasanas_vieta_ievade = ref('');
const attels_ievade = ref('');
const darba_apraksts_ievade = ref('');


const handleSubmit = () => {
  emits('submit', {
    nosaukums_ievade: nosaukums_ievade.value,
    iss_apraksts_ievade: iss_apraksts_ievade.value,
    alga_ievade: alga_ievade.value,
    atrasanas_vieta_ievade: atrasanas_vieta_ievade.value,
    attels_ievade: attels_ievade.value,
    darba_apraksts_ievade: darba_apraksts_ievade.value

  });
};

</script> -->

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
         
            nosaukums_ievade: "",
            iss_apraksts_ievade: "",
            alga_ievade: '',
            atrasanas_vieta_ievade: "",
            attels_ievade: "",
            darba_apraksts_ievade: "",
   
    };
  },
  mounted() {
    // this.getVakances();
  },
  methods: {
    getvakances() {
      axios.get(window.location.origin + '/api/vakance').then(response => {
        this.vakances = response.data;
      });
    },
    handleFileUpload(event) {
      this.attels_ievade = event.target.files[0];
    },
    createvakance() {

        let vacanceData = new FormData();
        
        vacanceData.append('nosaukums_ievade', this.nosaukums_ievade);
        vacanceData.append('iss_apraksts_ievade', this.iss_apraksts_ievade);
        vacanceData.append('alga_ievade', this.alga_ievade);
        vacanceData.append('atrasanas_vieta_ievade', this.atrasanas_vieta_ievade);
        vacanceData.append('attels_ievade', this. attels_ievade);
        vacanceData.append('darba_apraksts_ievade', this.darba_apraksts_ievade);

        axios.post('vakances/add', vacanceData, {
                headers: {
                'Content-Type': 'multipart/FormData'
                }
                }).then(() => {
                    this.izveidots()
                })
                .catch((error) => {
                    console.log('FAILURE!!', error);
                });
    }

    },

    setup() {

    const izveidots = () => {
                toast("Vakance ir veiksmīgi izveidota!", {
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
    

            <div class="mx-auto" >
                <div class="mx-auto p-10 ml-5 mr-5 text-gray-900">
                    <div class="p-10 ml-5 mr-5 text-gray-900">

                        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between max-lg:gap-4 w-full">
     <!-- Search Section -->
     <div class="relative w-full max-w-sm">
            <input type="text" id="search" class="h-12 border border-gray-300 text-gray-900 pl-4 text-base font-normal leading-7 rounded-full block w-full py-2.5 px-4 appearance-none relative focus:outline-none bg-white transition-all duration-500 hover:border-gray-400 hover:bg-gray-50 focus-within:bg-gray-50" placeholder="Vakanču meklēšana">
            <button class="absolute top-0 right-0 h-12 px-4 bg-main text-white rounded-r-full focus:outline-none hover:bg-green-600">Meklēt</button>
        </div>
  

        <!-- Your Workspace Section -->
        <button class="bg-main hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">
  Popularākie
</button>


<button v-if="$page.props.auth.user" onclick="Izveidot.showModal()" class="bg-main hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">
    Pievienot jaunu vakanci
</button>



<button class="bg-main hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">
  Visas vakances
</button>
        <div class="relative w-full max-w-sm mb-4 lg:mb-0">
            <svg class="absolute top-1/2 -translate-y-1/2 left-4 z-50" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.5555 3.33203H3.44463C2.46273 3.33203 1.66675 4.12802 1.66675 5.10991C1.66675 5.56785 1.84345 6.00813 2.16004 6.33901L6.83697 11.2271C6.97021 11.3664 7.03684 11.436 7.0974 11.5068C7.57207 12.062 7.85127 12.7576 7.89207 13.4869C7.89728 13.5799 7.89728 13.6763 7.89728 13.869V16.251C7.89728 17.6854 9.30176 18.6988 10.663 18.2466C11.5227 17.961 12.1029 17.157 12.1029 16.251V14.2772C12.1029 13.6825 12.1029 13.3852 12.1523 13.1015C12.2323 12.6415 12.4081 12.2035 12.6683 11.8158C12.8287 11.5767 13.0342 11.3619 13.4454 10.9322L17.8401 6.33901C18.1567 6.00813 18.3334 5.56785 18.3334 5.10991C18.3334 4.12802 17.5374 3.33203 16.5555 3.33203Z" stroke="black" stroke-width="1.6" stroke-linecap="round" />
            </svg>
            <select id="Offer" class="h-12 border border-gray-300 text-gray-900 pl-11 text-base font-normal leading-7 rounded-full block w-full py-2.5 px-4 appearance-none relative focus:outline-none bg-white transition-all duration-500 hover:border-gray-400 hover:bg-gray-50 focus-within:bg-gray-50">
                <option selected>Kārtot pēc...</option>
                <option value="option 1">...</option>
                <option value="option 2">...</option>
                <option value="option 3">...</option>
                <option value="option 4">...</option>
            </select>
        </div>
    </div>
</div>
      
<!-- вакансии -->

                        <!-- Выравнивание всех контейнеров -->
                        <div class="flex flex-wrap gap-16 place-content-center ">

                            <Crudvakances></Crudvakances>

                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow flex flex-col justify-between ">
                        <a href="#">
                            <img class="rounded-t-lg" src="../../photos/vakances (1).jpg" alt="" />
                        </a>
                        <div class="p-5 flex-grow">

                            <div v-if="$page.props.auth.user" class="flex justify-between">
                            <a href="#" onclick="Rediget.showModal()" class="transition-all  inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-orange-500 hover:bg-orange-600">
                                     Rediģēt
                                    <svg class="w-3.5 h-3.5 ms-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                        <path d="M17 0h-5.768a1 1 0 1 0 0 2h3.354L8.4 8.182A1.003 1.003 0 1 0 9.818 9.6L16 3.414v3.354a1 1 0 0 0 2 0V1a1 1 0 0 0-1-1Z"/>
                                        <path d="m14.258 7.985-3.025 3.025A3 3 0 1 1 6.99 6.768l3.026-3.026A3.01 3.01 0 0 1 8.411 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V9.589a3.011 3.011 0 0 1-1.742-1.604Z"/>
                                    </svg>
                                </a>
                                <a href="#" @click="openModalDzest" class="transition-all  inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-orange-500 hover:bg-ogange-600">
                                     Izdzēst
                                    <svg class="w-3.5 h-3.5 ms-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                        <path d="M17 0h-5.768a1 1 0 1 0 0 2h3.354L8.4 8.182A1.003 1.003 0 1 0 9.818 9.6L16 3.414v3.354a1 1 0 0 0 2 0V1a1 1 0 0 0-1-1Z"/>
                                        <path d="m14.258 7.985-3.025 3.025A3 3 0 1 1 6.99 6.768l3.026-3.026A3.01 3.01 0 0 1 8.411 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V9.589a3.011 3.011 0 0 1-1.742-1.604Z"/>
                                    </svg>
                                </a>
                           </div>


                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">PHP programmētājs</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Latvijas FinTech uzņēmums aicina savai komandai pievienoties, programmētāju</p>
                        </div>
                        <div class="p-5">
                            <div class="flex justify-between">
                                <a href="#" onclick="lasitVairak.showModal()" class=" transition-all inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-slate-500 hover:bg-slate-600">
                                    Lasīt vairāk
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                                <a href="#" onclick="Pieteikties.showModal()" class="transition-all  inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-slate-500 hover:bg-slate-600">
                                    Pieteikties
                                    <svg class="w-3.5 h-3.5 ms-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                        <path d="M17 0h-5.768a1 1 0 1 0 0 2h3.354L8.4 8.182A1.003 1.003 0 1 0 9.818 9.6L16 3.414v3.354a1 1 0 0 0 2 0V1a1 1 0 0 0-1-1Z"/>
                                        <path d="m14.258 7.985-3.025 3.025A3 3 0 1 1 6.99 6.768l3.026-3.026A3.01 3.01 0 0 1 8.411 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V9.589a3.011 3.011 0 0 1-1.742-1.604Z"/>
                                    </svg>
                                </a>
                                
                            </div>
                        </div>
                    </div>



                        </div>
                    <!-- конец вакансий -->

                </div>
            </div>
     
        

        

        <dialog id="lasitVairak" class="modal">
                        <div class="modal-box bg-white">
                            <h3 class="font-bold text-lg mb-5">PHP programmētājs</h3>
                            

                            <ol class="space-y-4 text-gray-600 list-decimal list-inside dark:text-gray-400">
                            <li>
                                Pienākumi:
                                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                                    <li>strādāt komandā, un prasme sadalīt darbu pa daļām</li>
                                    <li>aktīvi piedalīties visos projektos un izteikt savas idejas un risinājumus</li>
                                </ul>
                            </li>
                            <li>
                                No Jums sagaidām:
                                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                                    <li>Pieredze HTML/CSS, JavaScript (jQuery) , PHP ^8.0 un MySQL</li>
                                    <li>Pieredze ar MVC un OOP izstrādes principiem</li>
                                </ul>
                            </li>
                            <li>
                                Mēs piedāvājam:
                                <ul class="ps-5 mt-2 space-y-1 list-disc list-inside">
                                    <li>konkurētspējīgs atalgojums</li>
                                    <li>izaugsmes iespējas</li>
                                    <li>draudzīgs kolektīvs</li>
                                    <li>darbs mūsdienīgā birojā</li>
                                    <li>patīkama atmosfēra un elastīgs darba grafiks</li>
                                    <li>kafija, uzkodas, atpūtas vieta ir pieejami birojā bez ierobežojumiem 24/7</li>
                                </ul>
                            </li>
                            </ol>
                            <div class="modal-action">
                            <form method="dialog">
                                <button class="btn border-0 text-white bg-slate-500 hover:bg-slate-600t">Aizvērt</button>
                            </form>
                            </div>
                        </div>
            </dialog>


            <dialog id="Pieteikties" class="modal">
                        <div class="modal-box bg-white">
                            <h3 class="font-bold">Pieteikties</h3>
                            
                            <section class="bg-white dark:bg-gray-900">
                            <div class="max-w-2xl">
                                <h2 class="mb-4 mt-4 text-xl font-bold text-gray-900 dark:text-white">Pieteikties šai vakancei</h2>
                                <form action="#" class="space-y-7">
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Vārds</label>
                                    <input type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Vārds" required>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Uzvārds</label>
                                    <input type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Uzvārds" required>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Talrunis</label>
                                    <input type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="+37125524933" required>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">E-pasts</label>
                                    <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="it-speks@gmail.com" required>
                                </div>
                                <form class="max-w-lg mx-auto">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Lejupielādēt СV</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Ja vēlaties, varat augšupielādēt arī motivācijas vēstuli, vienkārši augšupielādējiet to kopā ar CV.</div>
                                </form>
                                
                                <div class="sm:col-span-2">
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Komentārs</label>
                                    <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-main focus:border-main" placeholder="Leave a comment..."></textarea>
                                </div>
                                <!-- <button @click="notify" class="btn bg-main border-0 text-white hover:bg-accent">Pieteikties</button> -->

                            </form>
                            </div>
                            </section>
                            <div class="modal-action flex justify-between">
                            <form method="dialog">
                                <button @click="notify" class="btn bg-main border-0 text-white hover:bg-accent">Pieteikties</button>
                            </form>
                            <form method="dialog">
                                <button class="btn border-0 text-white bg-slate-500 hover:bg-slate-600">Aizvērt</button>
                            </form>
                            </div>
                        </div>
            </dialog>

            <dialog id="Rediget" class="modal">
                        <div class="modal-box bg-white">
                            <h3 class="font-bold">Rediģēšana</h3>
                            
                            <section class="bg-white dark:bg-gray-900">
                            <div class="max-w-2xl">
                                <h2 class="mb-4 mt-4 text-xl font-bold text-gray-900 dark:text-white">Šīs vakances rediģēšana</h2>
                                <form action="#" class="space-y-7">
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Nosaukums</label>
                                    <input type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Vakances nosaukums" required>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">īss apraksts</label>
                                    <input type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="īss apraksts" required>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Alga</label>
                                    <input type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Alga" required>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Atrašanās vieta</label>
                                    <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Atrašanās vieta" required>
                                </div>
                                <form class="max-w-lg mx-auto">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Lejupielādēt attēlu</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">augšupielādējiet nelielu attēlu Jūsu vakancei.</div>
                                </form>
                                
                                <div class="sm:col-span-2">
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pilns darba apraksts</label>
                                    <textarea id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-main focus:border-main" placeholder="Pilns darba apraksts"></textarea>
                                </div>
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
                                <form @submit.prevent="createvakance" action="#" class="space-y-7">
                                <div>
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nosaukums</label>
                                    <input v-model="nosaukums_ievade" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Vakances nosaukums" required>
                                </div>
                                <div>
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">īss apraksts</label>
                                    <input v-model="iss_apraksts_ievade" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="īss apraksts" required>
                                </div>
                                <div>
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Alga</label>
                                    <input v-model="alga_ievade" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Alga" required>
                                </div>
                                <div>
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Atrašanās vieta</label>
                                    <input v-model="atrasanas_vieta_ievade" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Atrašanās vieta" required>
                                </div>
                                <form class="max-w-lg mx-auto">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Lejupielādēt attēlu</label>
                                <input @change="handleFileUpload" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">augšupielādējiet nelielu attēlu Jūsu vakancei.</div>
                                </form>
                                
                                <div class="sm:col-span-2">
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pilns darba apraksts</label>
                                    <textarea v-model="darba_apraksts_ievade" id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-main focus:border-main" placeholder="Pilns darba apraksts"></textarea>
                                </div>
                                <button class="btn bg-main border-0 text-white hover:bg-accent">Izveidot</button>
                            </form>
                            </div>
                            </section>
                        
                           
                            
                        </div>
            </dialog>

            <div>
  </div>
    </Welcome>
    <FooterAll></FooterAll>

    <!-- <Modal :show="isModalVisibleDzest" @close="closeModalDzest" maxWidth="md" >
      <template #default>
        <div class="p-4 ">
          <h2 class="text-lg font-semibold">Dzēšana!</h2>
          <p class="text-slate-700">Vai esat pārliecināts, ka vēlaties dzēst šo vakanci?</p>
          <div class="flex justify-between">
            <button @click="closeModalDzest" class="mt-4 px-4 py-2 bg-red-500 hover:bg-red-600 transition-all text-white rounded">JĀ</button>
          <button @click="closeModalDzest" class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 transition-all text-white rounded">NĒ</button>
          </div>
        </div>
      </template>
    </Modal> -->

</template>
