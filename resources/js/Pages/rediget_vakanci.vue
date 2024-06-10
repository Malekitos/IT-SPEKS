<template lang="">
    <div>
       
    

             <!-- Modal toggle -->
             <button v-on:click="toggleModal();editVakansi(vakance)" class="transition-all  inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-orange-500 hover:bg-ogange-600 hover:bg-orange-600">
                Rediģēt 
                <svg class="w-3.5 h-3.5 ms-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                        <path d="M17 0h-5.768a1 1 0 1 0 0 2h3.354L8.4 8.182A1.003 1.003 0 1 0 9.818 9.6L16 3.414v3.354a1 1 0 0 0 2 0V1a1 1 0 0 0-1-1Z"/>
                                        <path d="m14.258 7.985-3.025 3.025A3 3 0 1 1 6.99 6.768l3.026-3.026A3.01 3.01 0 0 1 8.411 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V9.589a3.011 3.011 0 0 1-1.742-1.604Z"/>
                </svg>
            </button>

            <!-- Main modal -->
            <div v-if="showModal" class="text-left text-base overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Vakances rediģēšana : {{vakance.nosaukums}}
                            </h3>
                            <button v-on:click="toggleModal()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                <svg  class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only" >Aizvert</span>
                            </button>
                            
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                          

                            <section class="bg-white dark:bg-gray-900">
                            <div class="max-w-2xl">
                            
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
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Atrašanās vieta  </label>
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
                            </form>
                            </div>
                            </section>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button v-on:click="toggleModal()"  @click="redigetVakance()" type="button" class="btn mr-12 border-0 text-white bg-orange-500  hover:bg-orange-600">Rediģēt</button>
                            <button v-on:click="toggleModal()" type="button" class="btn border-0 text-white bg-slate-500 hover:bg-slate-600">Aizvērt</button>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="showModal" class="opacity-40 fixed inset-0 z-30 bg-black "></div>
    </div>
</template>
<script>
  import { onMounted } from 'vue'
  import { initFlowbite } from 'flowbite'
  import { toast } from "vue3-toastify";
  import "vue3-toastify/dist/index.css";  
  export default {

    setup() {
      onMounted(() => {
        initFlowbite();
      });

      const izdzests = () => {
                toast("Vakance ir veiksmīgi izdzēsta!", {
        "theme": "colored",
        "type": "error",
        "transition": "flip",
        "dangerouslyHTMLString": true
        })
    }
    return { izdzests };
    
    },
    props:{
        vakance:{
            type:Object
        }
    },
    data(){
        return{
            showModal: false,
            nosaukums_ievade: "",
            iss_apraksts_ievade: "",
            alga_ievade: '',
            atrasanas_vieta_ievade: "",
            attels_ievade: "",
            darba_apraksts_ievade: "",
            attels_atrodas: "./images/"
        }
    },
    methods: {
    toggleModal: function(){
      this.showModal = !this.showModal;
    },

    editVakansi(vakance){

        this.nosaukums_ievade =  vakance.nosaukums,
        this.iss_apraksts_ievade = vakance.iss_apraksts,
        this.alga_ievade = vakance.alga,
        this.atrasanas_vieta_ievade = vakance.atrasanas_vieta,
        this.attels_ievade = vakance.attels,
        this.darba_apraksts_ievade = vakance.darba_apraksts

    },

    redigetVakance(){

        let vacanceData = new FormData();
            
            vacanceData.append('nosaukums_ievade', this.nosaukums_ievade);
            vacanceData.append('iss_apraksts_ievade', this.iss_apraksts_ievade);
            vacanceData.append('alga_ievade', this.alga_ievade);
            vacanceData.append('atrasanas_vieta_ievade', this.atrasanas_vieta_ievade);
            vacanceData.append('attels_ievade', this. attels_ievade);
            vacanceData.append('darba_apraksts_ievade', this.darba_apraksts_ievade);

            axios.patch('vakances/redigesana' + this.vakance.id, vacanceData, {
                    headers: {
                    'Content-Type': 'multipart/FormData'
                    }
                    }).then(() => {
                        // this.izveidots()
                    

                    })
                    .catch((error) => {
                        console.log('FAILURE!!', error);
                    });
        }

    },
  }

  </script>
<style lang="">
    
</style>