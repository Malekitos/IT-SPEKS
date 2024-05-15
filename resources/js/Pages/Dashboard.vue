<script setup>
import Welcome from '@/Pages/Welcome.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <Welcome>
        

        <div class="py-20 bg-gray-300">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="p-6 text-center text-6xl text-gray-900 font-bold">Mēs tev palīdzēsim atrast darbu IT jomā Latvijā!</div>
                    <div class="text-center text-xl font-bold"> Jebkura atrašanās vieta. Jebkurš pieredzes līmenis.</div>
                   <!-- <div v-if!=$page.props.auth.user>!!!</div> -->
                    
                </div>
            </div>
        </div>


        <div class="bg-gray-200 grid grid-cols-2 gap-1 items-center py-20">
        <div class="mr-6">
            <div class="pl-5 text-justify text-6xl text-gray-900 font-bold">Atradīsim darbu!</div>
            <p class="text-xl pl-5">IT IR SPĒKS ir viena no lielākajām un cienījamākajām kompānijām Latvijā, kas nodarbojas ar darba meklēšanu klientiem. Mēs lepojamies ar savu reputāciju, piedāvājot augstas kvalitātes nodarbinātības pakalpojumus, kas palīdz mūsu klientiem atrast piemērotas darba vietas, kas atbilst viņu kvalifikācijai un karjeras mērķiem.</p>
        </div>
        <div>
            <img src="https://www.ziprecruiter.ie/intl_assets/images/uk/mobile_and_desktop_alerts.svg" class="max-w-full  h-auto">
        </div>
    </div>

    <div class="bg-gray-300 grid grid-cols-4 gap-1 items-center py-20">
        <div class="mr-6">
            <div class="pl-5 text-justify text-6xl text-gray-900 font-bold">Jegors Kalējs</div>
            <p class="text-xl pl-5">Augsti kvalificēts programmētājs ar ilggadēju pieredzi informācijas tehnoloģiju industrijā. Viņš absolvējis Latvijas Universitāti, iegūstot bakalaura grādu “informātikas” virzienā, bet pēc tam turpinājis studijas un sekmīgi aizstāvējis maģistra disertāciju “programminženierijas” specialitātē.</p>
        </div>
        <div>
            <img src="https://as2.ftcdn.net/v2/jpg/00/77/83/23/1000_F_77832388_alTdc0SHQtLoHPJoLBrgD2w1b02M43IU.jpg" class="max-w-full  h-auto">
        </div>
        <div class="mr-6">
            <div class="pl-5 text-justify text-6xl text-gray-900 font-bold">Džonatans Svilis</div>
            <p class="text-xl pl-5">Augsti kvalificēts programmētājs ar ilggadēju pieredzi informācijas tehnoloģiju industrijā. Viņš absolvējis Latvijas Universitāti, iegūstot bakalaura grādu “informātikas” virzienā, bet pēc tam turpinājis studijas un sekmīgi aizstāvējis maģistra disertāciju “programminženierijas” specialitātē.</p>
        </div>
        <div>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Man_with_Pac-Man_T-Shirt_at_2011_NYC_Gay_Pride_Parade.jpg/1200px-Man_with_Pac-Man_T-Shirt_at_2011_NYC_Gay_Pride_Parade.jpg" class="max-w-full  h-auto">
        </div>
        
    </div>
    </Welcome>

</template>
