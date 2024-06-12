<template>
    <div>
       
    

             <!-- Modal toggle -->
             <button v-on:click="toggleModal();editJaunumi(jaunums)" class=" m-2 transition-all  inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-orange-500 hover:bg-ogange-600 hover:bg-orange-600">
                Rediģēt 
               
                <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z" clip-rule="evenodd"/>
                </svg>

            </button>

            <!-- Main modal -->
            <div v-if="showModal" class="text-left text-base overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Jaunumu rediģēšana : {{jaunums.nosaukums}}
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
                                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Nosaukums</label>
                                    <input v-model="nosaukums_ievade" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Vakances nosaukums" required>
                                </div>
                            </form>
                            </div>
                            </section>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button v-on:click="toggleModal()"  @click="redigetJaunumi()" type="button" class="btn mr-12 border-0 text-white bg-orange-500  hover:bg-orange-600">Rediģēt</button>
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
                toast("Vakance ir veiksmīgi rediģēta!", {
        "theme": "colored",
        "type": "info",
        "transition": "flip",
        "dangerouslyHTMLString": true
        })
    }
    return { redigets };
    
    },
    props:{
        jaunums:{
            type:Object
        }
    },
    data(){
        return{
            showModal: false,
            nosaukums_ievade: ""
        }
    },
    methods: {
    toggleModal: function(){
      this.showModal = !this.showModal;
    },

    editJaunumi(jaunums){

        this.nosaukums_ievade =  jaunums.nosaukums;

    },

    redigetJaunumi(){

        let jaunumuData = new FormData();
            
        jaunumuData.append('nosaukums_ievade', this.nosaukums_ievade);

            axios.post('Jaunumi/update/' + this.jaunums.id, jaunumuData, {
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