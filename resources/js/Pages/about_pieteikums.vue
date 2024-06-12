<template lang="">
    <div>
   
        

            <!-- Modal toggle -->           
            <a v-on:click="toggleModal()" href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">apskatit</a>
            <!-- Main modal -->
            <div v-if="showModal" class="text-left text-base overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                {{pieteikumi.vards}} {{pieteikumi.uzvards}}
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                <svg v-on:click="toggleModal()" class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only" >Aizvert</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <h3 class="font-bold text-lg mb-5"></h3>

                            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                            <div class="flex flex-col pb-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Šīs personas numurs </dt>
                                <dd class="text-lg font-semibold">{{pieteikumi.talrunis}}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Personas e-pasts</dt>
                                <dd class="text-lg font-semibold">{{pieteikumi.epasts}}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Personas komentāri</dt>
                                <dd class="text-lg font-semibold">{{pieteikumi.komentars}}</dd>
                            </div>
                            <div class="flex flex-col py-3">
                                <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">CV</dt>
                                <dd class="transition-all text-lg font-semibold "><a class="bg-slate-200 hover:bg-slate-300 transition-all p-1 rounded-md" :href="cv_atrodas+pieteikumi.cv" download>Lejupielādēt personas CV</a></dd>
                            </div>
                        </dl>

                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
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
  
  export default {

    setup() {
      onMounted(() => {
        initFlowbite();
      });
    },
    props:{
        pieteikumi:{
            type:Object
        }
    },
    data(){
        return{
            showModal: false,
            cv_atrodas: "./cv_files/",
        }
    },
    methods: {
    toggleModal: function(){
      this.showModal = !this.showModal;
    },

             
}
  }

  </script>
  
<style lang="">
    
</style>