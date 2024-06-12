<template>
    <div>
       
    

        

            <a v-on:click="toggleModal();editPieteikumi(pieteikumi)" href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">mainit statusu</a>

            <!-- Main modal -->
            <div v-if="showModal" class="text-left text-base overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                statusa maiņa: {{pieteikumi.vards}} {{ pieteikumi.uzvards }}
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
                                <select id="countries" v-model="statuss_ievade" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5">
                                    <option value="Pārskata procesā">Pārskata procesā</option>
                                    <option value="Pieņemts">Pieņemts</option>
                                    <option value="Atcelts">Atcelts</option>
                                </select>    </div>
                            </form>
                            </div>
                            </section>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button v-on:click="toggleModal()"  @click="redigetPieteikumi()" type="button" class="btn mr-12 border-0 text-white bg-orange-500  hover:bg-orange-600">Rediģēt</button>
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

      const redigets = () => {
                toast("Pieteikums ir veiksmīgi rediģēta!", {
        "theme": "colored",
        "type": "info",
        "transition": "flip",
        "dangerouslyHTMLString": true
        })
    }
    return { redigets };
    
    },
    props:{
        pieteikumi:{
            type:Object
        }
    },
    data(){
        return{
            showModal: false,
            statuss_ievade: ""
        }
    },
    methods: {
    toggleModal: function(){
      this.showModal = !this.showModal;
    },

    editPieteikumi(pieteikumi){

        this.statuss_ievade =  pieteikumi.statuss;

    },

    redigetPieteikumi(){

        let pieteikumiData = new FormData();
            
        pieteikumiData.append('statuss_ievade', this.statuss_ievade);

            axios.post('pieteikumi/update/' + this.pieteikumi.id, pieteikumiData, {
                    headers: {
                    'Content-Type': 'multipart/FormData'
                    }
                    }).then(() => {
                        this.redigets()
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