<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import { ref, onMounted } from 'vue'; // Импортируем onMounted
import Modal from '../Components/Modal.vue';
import izdzest_lietotaji from './izdzest_lietotaji.vue';
import rediget_lietotajus from './rediget_lietotajus.vue';
import axios from 'axios';


const notifyadd = () => {
  toast("Wow so easy !", {
    autoClose: 1000,
  }); // ToastOptions
  return { notifyadd };
};

const isModalVisiblePievienot = ref(false);
const isModalVisibleRediget = ref(false);
const isModalVisibleDzest = ref(false);

const openModalPievienot = () => {
  isModalVisiblePievienot.value = true;
};

const closeModalPievienot = () => {
  isModalVisiblePievienot.value = false;
};

const openModalRediget = () => {
  isModalVisibleRediget.value = true;
};

const closeModalRediget = () => {
  isModalVisibleRediget.value = false;
};

const openModalDzest = () => {
  isModalVisibleDzest.value = true;
};

const closeModalDzest = () => {
  isModalVisibleDzest.value = false;
};

const users = ref([]);

const fetchUsers = async () => {
  try {
    const response = await axios.get('users/show'); // Adjust the endpoint as needed
    users.value = response.data;
  } catch (error) {
    console.error('Error fetching users:', error);
  }
};

// Вызываем fetchUsers при монтировании компонента
onMounted(fetchUsers);

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
                                        e-pasts
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Loma
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Telefona numurs
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                    </th>
                                    <th>    <button @click="openModalPievienot" class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                                        <span class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                            Pievienot
                                        </span>
                                        </button></th>
                                    
                                </tr>
                            </thead>
                <tbody>
                  <tr v-for="user in users" :key="user.email" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">{{ user.name }}</td>
                    <td class="px-6 py-4">{{ user.surname }}</td>
                    <td class="px-6 py-4">{{ user.email }}</td>
                    <td class="px-6 py-4">{{ user.amats }}</td>
                    <td class="px-6 py-4">{{ user.number }}</td>
                    <td class="px-6 py-4 text-right">
                      <rediget_lietotajus :user="user" @click="fetchUsers()"></rediget_lietotajus>
                    </td>
                    <td class="px-6 py-4 text-right">
                      
                      <izdzest_lietotaji :user="user" @click="fetchUsers()"></izdzest_lietotaji>
                    </td>
                  </tr>
                </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
      



    <Modal :show="isModalVisiblePievienot" @close="closeModalPievienot" maxWidth="md" >
      <template #default>
        <div class="p-4 ">
          
          <h3 class="font-bold">Pievienošana</h3>
                            
                            <section class="bg-white dark:bg-gray-900">
                            <div class="max-w-2xl">
                                <h2 class="mb-4 mt-4 text-xl font-bold text-gray-900 dark:text-white">Izveidot jaunu lietotāju</h2>
                                <form action="#" class="space-y-7">
                                <div>
    <label for="editVards" class="block mb-2 text-sm font-medium text-gray-900">Vārds</label>
    <input type="text" id="editVards" pattern="[A-Za-zĀ-ž]+" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Vārds" required>
</div>
<div>
    <label for="editUzvards" class="block mb-2 text-sm font-medium text-gray-900">Uzvārds</label>
    <input type="text" id="editUzvards" pattern="[A-Za-zĀ-ž]+" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="Uzvārds" required>
</div>
<div>
    <label for="editTalrunis" class="block mb-2 text-sm font-medium text-gray-900">Talrunis</label>
    <input type="tel" id="editTalrunis" pattern="[0-9]{1,8}" maxlength="8" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="+37125524933" required>
</div>
<div>
    <label for="editEpasts" class="block mb-2 text-sm font-medium text-gray-900">E-pasts</label>
    <input type="email" id="editEpasts" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="it-speks@gmail.com" required>
</div>
<div>
    <label for="editParole" class="block mb-2 text-sm font-medium text-gray-900">Parole</label>
    <input type="password" id="editParole" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="*strong password*" required>
</div>
<div>
    <label for="editRole" class="block mb-2 text-sm font-medium text-gray-900">Loma</label>
    <select id="editRole" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" required>
        <option value="" disabled selected>Izvēlēties lomu</option>
        <option value="admin">Administrators</option>
        <option value="moderator">Moderators</option>
    </select>
</div>
                                                            

                                <!-- <button @click="notify" class="btn bg-main border-0 text-white hover:bg-accent">Pieteikties</button> -->

                            </form>
                            </div>
                            </section>
                            

          <div class="flex justify-between">
            <button @click="closeModalPievienot" class="mt-4 px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded transition-all">Pievienot</button>
          <button @click="closeModalPievienot" class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded transition-all">Aizvērt</button>
          </div>
        </div>
      </template>
    </Modal>

    <Modal :show="isModalVisibleRediget" @close="closeModalRediget" maxWidth="md" >
      <template #default>
        <div class="p-4 Rediģēšana ">
          <h3 class="font-bold">Rediģēšana</h3>
                            
                            <section class="bg-white dark:bg-gray-900">
                            <div class="max-w-2xl">
                                <h2 class="mb-4 mt-4 text-xl font-bold text-gray-900 dark:text-white">Lietotāja rediģēšana</h2>
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
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Parole</label>
                                    <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" placeholder="*strong password*" required>
                                </div>
                                <div>
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Loma</label>
                                <select id="role" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-main focus:border-main block w-full p-2.5" required>
                                    <option value="" disabled selected>Izvēlēties lomu</option>
                                    <option value="admin">Administrators</option>
                                    <option value="moderator">Moderators</option>
                                </select>
                                </div>
                                                            

                                <!-- <button @click="notify" class="btn bg-main border-0 text-white hover:bg-accent">Pieteikties</button> -->

                            </form>
                            </div>
                            </section>
          <div class="flex justify-between">
            <button @click="closeModalRediget" class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded transition-all">Rediģēt</button>
          <button @click="closeModalRediget" class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded transition-all">Aizvērt</button>
          </div>
        </div>
      </template>
    </Modal>

    <Modal :show="isModalVisibleDzest" @close="closeModalDzest" maxWidth="md" >
      <template #default>
        <div class="p-4 ">
          <h2 class="text-lg font-semibold">Dzēšana!</h2>
          <p class="text-slate-700">Vai esat pārliecināts, ka vēlaties dzēst šo lietotāju?</p>
          <div class="flex justify-between">
            <button @click="closeModalDzest" class="mt-4 px-4 py-2 bg-red-500 hover:bg-red-600 transition-all text-white rounded">JĀ</button>
          <button @click="closeModalDzest" class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 transition-all text-white rounded">NĒ</button>
          </div>
        </div>
      </template>
    </Modal>
   

    

    </AuthenticatedLayout>
    

</template>
