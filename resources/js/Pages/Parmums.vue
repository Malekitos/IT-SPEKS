<script setup>
import Welcome from '@/Pages/Welcome.vue';
import { Head } from '@inertiajs/vue3';
import FooterAll from '@/Pages/FooterAll.vue';
</script>

<template>
    <Head title="Dashboard" />

    <Welcome>
        
        <div class="relative flex justify-center">
            <img src="../../photos/background.jpeg" class="blur-sm brightness-50 w-full h-auto">
            <div class="absolute">
                <h1 class="font-bold text-white text-8xl mt-40">IT-SPEKS</h1>
            </div>
            <div class="absolute mt-80 bg-white  max-w-4xl pb-40 rounded-sm text-center">
                <h1 class="m-10 font-bold text-gray-800 text-4xl">IT-SPEKS programmatūras izstrādes uzņēmums jūsu vajadzībām ar ilgtermiņa atbalstu.</h1>
                <p class="m-10 text-slate-500 text-2xl">"Tehnoloģiju pasaulē nepārtraukta mācīšanās nav tikai stratēģija, tā ir izdzīvošana."</p>

                <div class="flex justify-around mt-10 text-slate-600">
                    <div class="text-center">
                        <svg class="w-6 h-6 text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z"/></svg>
                        IT-SPEKS@gmail.com </div>
                    <div>
                        <svg class="w-6 h-6 text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16v-5.5A3.5 3.5 0 0 0 7.5 7m3.5 9H4v-5.5A3.5 3.5 0 0 1 7.5 7m3.5 9v4M7.5 7H14m0 0V4h2.5M14 7v3m-3.5 6H20v-6a3 3 0 0 0-3-3m-2 9v4m-8-6.5h1"/>
                        </svg>
                        Invalīdu iela 4, Liepāja</div>
                    <div>
                        <svg class="w-6 h-6 text-main dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.427 14.768 17.2 13.542a1.733 1.733 0 0 0-2.45 0l-.613.613a1.732 1.732 0 0 1-2.45 0l-1.838-1.84a1.735 1.735 0 0 1 0-2.452l.612-.613a1.735 1.735 0 0 0 0-2.452L9.237 5.572a1.6 1.6 0 0 0-2.45 0c-3.223 3.2-1.702 6.896 1.519 10.117 3.22 3.221 6.914 4.745 10.12 1.535a1.601 1.601 0 0 0 0-2.456Z"/>
                        </svg>

                        +371 29 695 026</div>
                </div>

            </div>
        </div>

    </Welcome>
    <FooterAll></FooterAll>
</template>
