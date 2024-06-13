<script>

import Welcome from '@/Pages/Welcome.vue';
import { Head } from '@inertiajs/vue3';
import FooterAll from '@/Pages/FooterAll.vue';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import about_vacancy from './about_vacancy.vue';
import izdzest_vakanci from './izdzest_vakanci.vue'
import rediget_vakanci from './rediget_vakanci.vue'
import izveidot_pieteikumu from './izveidot_pieteikumu.vue'
import 'flowbite';
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import axios from 'axios';

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
    rediget_vakanci,
    izveidot_pieteikumu
  },

  data() {
    return {
        filters: {
                workType: '',
                keyword: '',
                workgraph: '',
                language: '',
                salary: ''
            },
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

            vards_ievade: "",
            uzvards_ievade: "",
            talrunis_ievade: "",
            epasts_ievade: "",
            cv_ievade: "",
            komentars_ievade: "",
            vakance_ievade: "",

   
    };
  },

  computed: {
  filteredVakances() {
    if (
      this.filters.workType === '' &&
      this.filters.keyword === '' &&
      this.filters.workgraph === '' &&
      this.filters.language === '' &&
      this.filters.salary === ''
    ) {
      // If no filters are selected, return all vacancies
      return this.vakances;
    } else {
      // If filters are selected, apply filtering logic
      return this.vakances.filter(vakance => {
        return (
          (this.filters.workType === '' || vakance.darba_veids === this.filters.workType) &&
          (this.filters.keyword === '' || vakance.nosaukums.toLowerCase().includes(this.filters.keyword.toLowerCase())) &&
          (this.filters.workgraph === '' || vakance.darba_laiks == this.filters.workgraph) &&
          (this.filters.language === '' || vakance.valodas_veids === this.filters.language) &&
          (this.filters.salary === '' || vakance.alga >= this.filters.salary)
        );
      });
    }
  }
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
        },


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
                <select v-model="filters.workType" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="">{{  $t("chooseAll") }}</option>
                    <option value="Uzvietas">{{  $t("onsite") }}</option>
                    <option value="Attalinati">{{  $t("remote") }}</option>
                </select>
            </div>
    
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700">{{  $t("keyword") }}</label>
                <input v-model="filters.keyword" type="text" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" >
            </div>
        </div>
        <div class="flex items-center space-x-4 mt-4">

  
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700">{{  $t("workgraph") }}</label>
                <select v-model="filters.workgraph" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="">{{  $t("chooseAll") }}</option>
                    <option value=6>{{  $t("hours6") }}</option>
                    <option value=8>{{  $t("hours8") }}</option>
                    <option value=12>{{  $t("hours12") }}</option>
                </select>
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700">{{  $t("languages") }}</label>
                <select v-model="filters.language" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="">{{  $t("chooseAll") }}</option>
                    <option value="Latviesu">{{  $t("langlv") }}</option>
                    <option value="Anglu">{{  $t("langen") }}</option>
                </select>
            </div>
            <div class="flex-1">
                <label class="block text-sm font-medium text-gray-700">  <option>{{  $t("salary") }}</option></label>
                <input v-model="filters.salary" type="number" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            </div>
        </div>

        <div class="flex justify-center mt-4">
        
            <button v-if="$page.props.auth.user" onclick="Izveidot.showModal()" class="bg-main hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md">
                Pievienot jaunu vakanci
            </button>   
        </div>
     

    </div>
      
                        <!-- вакансии -->
                        <!-- Выравнивание всех контейнеров -->
                <div class="flex flex-wrap gap-16 place-content-center">
                    <div v-for="(vakance, index) in filteredVakances" :key="index" class="max-w-sm bg-white border border-gray-200 rounded-lg shadow flex flex-col justify-between">
                        <a href="#">
                            <img class="rounded-t-lg" :src=attels_atrodas+vakance.attels alt="" />
                        </a>
                        <div class="p-5">
                            <div class="flex items-center justify-between">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ vakance.nosaukums_ievade }}</h5>
                            </div>
                            <p class="mb-3 font-normal text-gray-700">{{ vakance.iss_apraksts_ievade }}</p>







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

                                <izveidot_pieteikumu :vakance="vakance" ></izveidot_pieteikumu>


                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

 <!-- --------------Modali----------------- -->        


            

            

            <dialog id="Izveidot" class="modal">
                        <div class="modal-box bg-white">
                            <h3 class="font-bold">Izveidošana</h3>
                            
                            <section class="bg-white dark:bg-gray-900">
                            <div class="max-w-2xl">
                                <h2 class="mb-4 mt-4 text-xl font-bold text-gray-900 dark:text-white">Jaunas vakances izveide</h2>
                                <form @submit.prevent="createvakance" action="#" class="space-y-7">
                                <div>
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nosaukums</label>
                                    <input maxlength='20' v-model="nosaukums_ievade" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Vakances nosaukums" required>
                                </div>
                                <div>
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">īss apraksts</label>
                                    <input maxlength='30' v-model="iss_apraksts_ievade" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="īss apraksts" required>
                                </div>
                                <div>
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Alga</label>
                                    <input v-model="alga_ievade" type="number" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Alga" required>
                                </div>
                                <div>
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Atrašanās vieta</label>
                                    <input maxlength='20' v-model="atrasanas_vieta_ievade" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Atrašanās vieta" required>
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
                                    <option value="Latviesu">Latviešu valoda</option>
                                    <option value="Anglu">Angļu valoda</option>
                                </select>
                                

                                
                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Izvēlieties šīs vakances darba laiku</label>
                                <select required id="countries" v-model="darba_laiks_ievade" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5">
                                    <option value=6>6 stundas</option>
                                    <option value=8>8 stundas</option>
                                    <option value=12>12 stundas</option>
                                </select>
                                

                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Izvēlieties darba veidu šai vakancei</label>
                                <select id="countries" v-model="darba_veids_ievade" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5">
                                    <option value="Uzvietas">Uz vietas</option>
                                    <option value="Attalinati">Attālināti</option>
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

</template>
