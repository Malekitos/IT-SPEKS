<template>
    <div>
       
    

             <!-- Modal toggle -->
             
            <a href="#" v-on:click="toggleModal()" class="transition-all  inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-slate-500 hover:bg-slate-600">
                                    Pieteikties
                                    <svg class="w-3.5 h-3.5 ms-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                        <path d="M17 0h-5.768a1 1 0 1 0 0 2h3.354L8.4 8.182A1.003 1.003 0 1 0 9.818 9.6L16 3.414v3.354a1 1 0 0 0 2 0V1a1 1 0 0 0-1-1Z"/>
                                        <path d="m14.258 7.985-3.025 3.025A3 3 0 1 1 6.99 6.768l3.026-3.026A3.01 3.01 0 0 1 8.411 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V9.589a3.011 3.011 0 0 1-1.742-1.604Z"/>
                                    </svg>
                                </a>

            <!-- Main modal -->
            <div v-if="showModal" class="text-left text-base overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Pieteikums uz šo vakanci : {{vakance.nosaukums}}
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
                            
                                <form action="#" class="space-y-7">
                                <div>
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Vārds</label>
                                    <input v-model="vards_ievade" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Jūsu vārds" required>
                                </div>
                                <div>
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Uzvārds</label>
                                    <input v-model="uzvards_ievade" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Jūsu uzvārds" required>
                                </div>
                                <div>
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Talrunis</label>
                                    <input v-model="talrunis_ievade" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Jūsu tālruņa numurs" required>
                                </div>
                                <div>
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">E-Pasts</label>
                                    <input v-model="epasts_ievade" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Uzakstiet savu pastu" required>
                                </div>
                                
                                <div class="sm:col-span-2">
                                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Komentāri/Motivācijas vēstule</label>
                                    <textarea v-model="komentars_ievade" id="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-main focus:border-main" placeholder="Uzakstiet mazliet par sevi, atstājiet komentāru vai uzrakstiet motivācijas vēstuli."></textarea>
                                </div>
                                
                                <form class=" mx-auto">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Lejupielādēt CV</label>
                                <input @change="handleFileUpload" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file" required>
                                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Noteikti pievienojiet savu CV.</div>
                                </form>

                            </form>
                            </div>
                            </section>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button v-on:click="toggleModal()"  @click="createPieteikums(vakance.nosaukums)" type="button" class="btn mr-12 border-0 text-white bg-green-500  hover:bg-green-600">Aizsūtīt</button>
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

      const izveidots = () => {
        toast("Jūsu pieteikums ir veiksmīgi Aizsūtīts!", {
        "theme": "colored",
        "type": "success",
        "transition": "flip",
        "dangerouslyHTMLString": true
        })
    }
    return { izveidots };
    
    },
    props:{
        vakance:{
            type:Object
        }
    },
    data(){
        return{
            showModal: false,
            loading: true,
            nosaukums_ievade: "",
            vards_ievade: "",
            uzvards_ievade: "",
            talrunis_ievade: "",
            epasts_ievade: "",
            komentars_ievade: "",
            cv_ievade: "",

            
        }
    },
    methods: {
    toggleModal: function(){
      this.showModal = !this.showModal;
    },

        handleFileUpload(event) {
        this.cv_ievade = event.target.files[0];
        },

        createPieteikums(nosaukums) {

        let pieteikumuData = new FormData();

        pieteikumuData.append('vakance_ievade', nosaukums);

        pieteikumuData.append('vards_ievade', this.vards_ievade);
        pieteikumuData.append('uzvards_ievade', this.uzvards_ievade);
        pieteikumuData.append('talrunis_ievade', this.vakance.talrunis_ievade);
        pieteikumuData.append('epasts_ievade', this.epasts_ievade);
        pieteikumuData.append('komentars_ievade', this.komentars_ievade);
        pieteikumuData.append('cv_ievade', this.cv_ievade);


        axios.post('pieteikumi/add', pieteikumuData, {
                headers: {
                'Content-Type': 'multipart/FormData'
                }
                }).then(() => {
                    this.izveidots()
                })
                .catch((error) => {
                    console.log('FAILURE!!', error);
                });
        },

    },
  }

  </script>
