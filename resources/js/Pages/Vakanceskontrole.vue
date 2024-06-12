<script>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import 'flowbite';
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import axios from 'axios';
import izveidot_pieteikumu from './izveidot_pieteikumu.vue';
import rediget_pieteikumui from './rediget_pieteikumu.vue'
import about_pieteikums from './about_pieteikums.vue';
import izdzest_pieteikumu from './izdzest_pieteikumu.vue';

onMounted(() => {
    initFlowbite();
})

export default {
    components: {
    AuthenticatedLayout,
    Head,
    izveidot_pieteikumu,
    rediget_pieteikumui,
    about_pieteikums,
    izdzest_pieteikumu

  },

  data() {
    return {
  
            pieteikumi: [],

   
    };
  },

  methods: {
        getPieteikumi() {
        axios.get('pieteikumi/show').then(response => {
            this.pieteikumi = response.data;
        }).catch((error) => {
                        console.log('FAILURE!!', error);
                    });
        },
      


    },

    mounted() {
    this.getPieteikumi();
  },

    setup() {

    const ienacis = () => {
                toast("Jūs esat ienācis administratora dalā, laipni lūdzam. ", {
        "type": "default",
        "transition": "flip",
        "dangerouslyHTMLString": true
        })
    }
    return { ienacis };
    
   }
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout class="">
        
        

        <div class="py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg bg-slate-200">
                    <div class="p-6 text-gray-900">
                        

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Vārds 
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Uzvārds
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Vakancija
                                    </th>
                                    <th>Statuss</th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Apskatit
                                    </th>
                                    <th></th>
                                    <th></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(pieteikumi, index) in pieteikumi" :key="index" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{pieteikumi.vards}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{pieteikumi.uzvards}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{pieteikumi.vakance}}
                                    </td>
                                    <td>
                                        {{pieteikumi.statuss}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <about_pieteikums :pieteikumi="pieteikumi"></about_pieteikums>
                                    </td>
                                        
                                    <td class="px-6 py-4 text-right">
                                        <rediget_pieteikumui :pieteikumi="pieteikumi" @click="getPieteikumi()"></rediget_pieteikumui>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <izdzest_pieteikumu :pieteikumi="pieteikumi" @click="getPieteikumi()"></izdzest_pieteikumu>
                                    </td>
                                    
                                </tr>

                                
                                
                            </tbody>
                        </table>
                        
                    </div>
                
                    </div>
                </div>
            </div>
        </div>
        
      
        <!-- <select id="role" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" required>
                                    <option value="" disabled selected>Izvēlieties jaunu statusu</option>
                                    <option value="admin">Apstrādē</option>
                                    <option value="moderator">Sarunā ar personu</option>
                                    <option value="moderator">Atteikts</option>
                                </select> -->


    

    

    
   

    

    </AuthenticatedLayout>
    

</template>
