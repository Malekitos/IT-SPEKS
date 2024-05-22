<script setup>
import Welcome from '@/Pages/Welcome.vue';
import { Head } from '@inertiajs/vue3';
import FooterAll from '@/Pages/FooterAll.vue';
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";

const notify = () => {
    toast("Jūsu pieteikums ir veiksmīgi nosūtīts", {
  "theme": "auto",
  "type": "success",
  "dangerouslyHTMLString": true
});
  return { notify };
};
    

</script>

<template>
    <Head title="Dashboard" />
    <Welcome>
    

        <div class="">
            <div class="mx-auto">
                    <div class="p-10 ml-5 mr-5 text-gray-900">
                        <form class="max-w-lg mx-auto mb-10">   
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-main focus:border-main " placeholder="Vakanču meklēšana" required />
                                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-main hover:bg-accent  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">Meklēt</button>
                            </div>
                        </form>

<!-- вакансии -->


                        <div class="flex flex-wrap gap-16 place-content-center "> 
                            <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                            <a href="#">
                                <img class="rounded-t-lg" src="../../photos/vakances (1).jpg" alt="" />
                            </a>
                            <div class="p-5 ">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">PHP programmētājs</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Latvijas FinTech uzņēmums aicina savai komandai pievienoties, programmētāju</p>
                                
                                <div class="flex justify-between ">
                                    <a href="#" onclick="lasitVairak.showModal()" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-slate-500 hover:bg-slate-600 ">
                                    Lasīt vairāk
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            
                                <a href="#" onclick="Pieteikties.showModal()" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-slate-500 hover:bg-slate-600">
                                    Pieteikties
                                    <svg class="w-3.5 h-3.5 ms-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                        <path d="M17 0h-5.768a1 1 0 1 0 0 2h3.354L8.4 8.182A1.003 1.003 0 1 0 9.818 9.6L16 3.414v3.354a1 1 0 0 0 2 0V1a1 1 0 0 0-1-1Z"/>
                                        <path d="m14.258 7.985-3.025 3.025A3 3 0 1 1 6.99 6.768l3.026-3.026A3.01 3.01 0 0 1 8.411 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V9.589a3.011 3.011 0 0 1-1.742-1.604Z"/>
                                    </svg>
                                </a>
                                </div>
                            </div>
                            </div>
                            
                            <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg" src="../../photos/vakances (2).jpg" alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sistēmanalītiķis - Asistents</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">IT uzņēmums SIA SmartSYS aicina pievienoties mūsu komandai sistēmanalītiķi. Ikdienā nodarbojamies ar dažādu IT sistēmu izstrādi un uzturēšanu.</p>
                                
                                <div class="flex justify-between">
                                    <a href="#" onclick="lasitVairak.showModal()" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-slate-500 hover:bg-slate-600 ">
                                    Lasīt vairāk
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            
                                <a href="#" onclick="Pieteikties.showModal()" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-slate-500 hover:bg-slate-600">
                                    Pieteikties
                                    <svg class="w-3.5 h-3.5 ms-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                        <path d="M17 0h-5.768a1 1 0 1 0 0 2h3.354L8.4 8.182A1.003 1.003 0 1 0 9.818 9.6L16 3.414v3.354a1 1 0 0 0 2 0V1a1 1 0 0 0-1-1Z"/>
                                        <path d="m14.258 7.985-3.025 3.025A3 3 0 1 1 6.99 6.768l3.026-3.026A3.01 3.01 0 0 1 8.411 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V9.589a3.011 3.011 0 0 1-1.742-1.604Z"/>
                                    </svg>
                                </a>
                                </div>
                            </div>
                            </div>


                            <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg" src="../../photos/vakances (3).jpg" alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Sistēmanalītiķis</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">A/S RIX Technologies, viens no vadošajiem programmizstrādes uzņēmumiem Latvijā, kas specializējas valsts nozīmes informācijas sistēmu un citu e-pārvaldes risinājumu izstrādes un integrēšanas jomā, aicina pievienoties savai komandai SISTĒMANALĪTIĶI.u</p>
                                
                                <div class="flex justify-between">
                                    <a href="#" onclick="lasitVairak.showModal()" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-slate-500 hover:bg-slate-600 ">
                                    Lasīt vairāk
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            
                                <a href="#" onclick="Pieteikties.showModal()" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-slate-500 hover:bg-slate-600">
                                    Pieteikties
                                    <svg class="w-3.5 h-3.5 ms-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                        <path d="M17 0h-5.768a1 1 0 1 0 0 2h3.354L8.4 8.182A1.003 1.003 0 1 0 9.818 9.6L16 3.414v3.354a1 1 0 0 0 2 0V1a1 1 0 0 0-1-1Z"/>
                                        <path d="m14.258 7.985-3.025 3.025A3 3 0 1 1 6.99 6.768l3.026-3.026A3.01 3.01 0 0 1 8.411 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V9.589a3.011 3.011 0 0 1-1.742-1.604Z"/>
                                    </svg>
                                </a>
                                </div>
                            </div>
                            </div>

                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <a href="#">
                                <img class="rounded-t-lg" src="../../photos/vakances (4).jpg" alt="" />
                            </a>
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">IT Business Analyst</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Vai jūs meklējat izaicinājumus jomā, kurā varētu izmantot savas analītiskās prasmes un iegūt jaunas biznesa analīzes un tehniskās zināšanas?</p>
                                
                                <div class="flex justify-between ">
                                    <a href="#" onclick="lasitVairak.showModal()" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-slate-500 hover:bg-slate-600 ">
                                    Lasīt vairāk
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            
                                <a href="#" onclick="Pieteikties.showModal()" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-slate-500 hover:bg-slate-600">
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

            <div>
  </div>
    </Welcome>
    <FooterAll></FooterAll>

</template>
