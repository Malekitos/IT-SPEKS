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
import about_vacancy from './about_vacancy.vue';
import izdzest_vakanci from './izdzest_vakanci.vue'
import rediget_vakanci from './rediget_vakanci.vue'
import 'flowbite';
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'

onMounted(() => {
    initFlowbite();
})

export default {
    components: {
    Welcome,
    Head,
    FooterAll,
    about_vacancy,
    izdzest_vakanci,
    rediget_vakanci
  },

  data() {
    return {
            vakances: [],
            nosaukums_ievade: "",
            iss_apraksts_ievade: "",
            alga_ievade: '',
            atrasanas_vieta_ievade: "",
            attels_ievade: "",
            darba_apraksts_ievade: "",
            attels_atrodas: "./images/",
            darba_veids_ievade: "",
            darba_laiks_ievade: '',
            valodas_veids_ievade: "",

   
    };
  },
  
  methods: {
        getVakances() {
        axios.get('vakances/show').then(response => {
            this.vakances = response.data;
        }).catch((error) => {
                        console.log('FAILURE!!', error);
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
            vacanceData.append('darba_veids_ievade', this.darba_veids_ievade);
            vacanceData.append('darba_laiks_ievade', this. darba_laiks_ievade);
            vacanceData.append('valodas_veids_ievade', this.valodas_veids_ievade);

            axios.post('vakances/add', vacanceData, {
                    headers: {
                    'Content-Type': 'multipart/FormData'
                    }
                    }).then(() => {
                        this.izveidots()
                        this.getVakances()
                    })
                    .catch((error) => {
                        console.log('FAILURE!!', error);
                    });
        }

    },

    mounted() {
    this.getVakances();
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
                    <div class="bg-white p-4 rounded-lg shadow-md max-w-4xl mx-auto mb-10">
        <div class="flex items-center space-x-4">
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700">{{  $t("workType") }}</label>
                <select class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option>{{  $t("chooseAll") }}</option>
                    <option value="onsite">{{  $t("onsite") }}</option>
                    <option value="remote">{{  $t("remote") }}</option>
                </select>
            </div>
    
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700">{{  $t("keyword") }}</label>
                <input type="text" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" >
            </div>
        </div>
        <div class="flex items-center space-x-4 mt-4">

  
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700">{{  $t("workgraph") }}</label>
                <select class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option>{{  $t("chooseAll") }}</option>
                    <option value=6>{{  $t("hours6") }}</option>
                    <option value=8>{{  $t("hours8") }}</option>
                    <option value=12>{{  $t("hours12") }}</option>
                </select>
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700">{{  $t("languages") }}</label>
                <select class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="">{{  $t("chooseAll") }}</option>
                    <option value="LV">{{  $t("langlv") }}</option>
                    <option value="EN">{{  $t("langen") }}</option>
                </select>
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700">  <option>{{  $t("salary") }}</option></label>
                <input type="number" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            </div>
        </div>

        <div class="flex justify-between mt-4">
            <button class="bg-main hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md">{{ $t ("find")}}</button>
            <button v-if="$page.props.auth.user" onclick="Izveidot.showModal()" class="bg-main hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md">
                Pievienot jaunu vakanci
            </button>   
        </div>
     

    </div>
      
<!-- вакансии -->

                <!-- <div v-for="(vakance,index) in vakances":key="index">

                    {{ vakance.nosaukums }}

                </div> -->

                        <!-- Выравнивание всех контейнеров -->
                        <div class="flex flex-wrap gap-16 place-content-center ">

                        

                    <div v-for="(vakance,index) in vakances":key="index" class="max-w-sm bg-white border border-gray-200 rounded-lg shadow flex flex-col justify-between ">
                        <a href="#">
                            <img class="rounded-t-lg" :src=attels_atrodas+vakance.attels alt="" />
                        </a>
                        <div class="p-5 flex-grow">

                            <div v-if="$page.props.auth.user" class="flex justify-between">
                            <rediget_vakanci :vakance="vakance" @click="getVakances()"></rediget_vakanci>
                              <izdzest_vakanci :vakance="vakance" @click="getVakances()"></izdzest_vakanci>
                           </div>

                           
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">  {{ vakance.nosaukums }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"> {{ vakance.iss_apraksts }} </p>
                        </div>
                        <div class="p-5">
                            <div class="flex justify-between">
                              

                                <about_vacancy :vakance="vakance" ></about_vacancy>

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
                            </form>
                            </div>
                            </section>
                            <div class="modal-action flex justify-between">
                            <form method="dialog">
                                <button class="btn bg-main border-0 text-white hover:bg-accent">Pieteikties</button>
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
                                <input @change="handleFileUpload" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file" required>
                                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">augšupielādējiet nelielu attēlu Jūsu vakancei.</div>
                                </form>
                                
                                <div class="sm:col-span-2">
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pilns darba apraksts</label>
                                    <textarea v-model="darba_apraksts_ievade" id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-main focus:border-main" placeholder="Pilns darba apraksts" required></textarea>
                                </div>

                                

                              
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Izvēlieties valodu šai vakancei</label>
                                <select id="countries" v-model="valodas_veids_ievade" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5">
                                    <option value="LV">Latviešu valoda</option>
                                    <option value="EN">Angļu valoda</option>
                                </select>
                                

                                
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Izvēlieties šīs vakances darba laiku</label>
                                <select required id="countries" v-model="darba_laiks_ievade" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5">
                                    <option value=6>6 stundas</option>
                                    <option value=8>8 stundas</option>
                                    <option value=12>12 stundas</option>
                                </select>
                                

                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Izvēlieties darba veidu šai vakancei</label>
                                <select id="countries" v-model="darba_veids_ievade" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5">
                                    <option value="vietas">Uz vietas</option>
                                    <option value="attalinati">Attālināti</option>
                                </select>
                                




                                <button @click="getVakances()"  class="btn bg-main border-0 text-white hover:bg-accent">Izveidot</button>
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
