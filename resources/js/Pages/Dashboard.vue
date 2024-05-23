<script setup>
import Welcome from '@/Pages/Welcome.vue';
import { Head } from '@inertiajs/vue3';
import FooterAll from '@/Pages/FooterAll.vue';
</script>

<template>
    <Head title="Dashboard" />

    <Welcome>


        <div class="py-20 bg-main text-white">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="p-6 text-center text-6xl font-bold">Mēs tev palīdzēsim atrast darbu IT jomā Latvijā!</div>
                    <div class="text-center text-xl font-bold"> Jebkura atrašanās vieta. Jebkurš pieredzes līmenis.</div>
                   <!-- <div v-if!=$page.props.auth.user>!!!</div> -->
                    
                </div>
            </div>
        </div>

        <div class="bg-whitem">
        <div class="container px-5  mx-auto">
        <div class="bg-whitem grid grid-cols-2 gap-1 items-center py-20">
        <div class="mr-6">
            <div class="pl-5 text-justify text-6xl text-gray-900 font-bold">Atradīsim darbu!</div>
            <p class="text-xl pl-5">IT IR SPĒKS ir viena no lielākajām un cienījamākajām kompānijām Latvijā, kas nodarbojas ar darba meklēšanu klientiem. Mēs lepojamies ar savu reputāciju, piedāvājot augstas kvalitātes nodarbinātības pakalpojumus, kas palīdz mūsu klientiem atrast piemērotas darba vietas, kas atbilst viņu kvalifikācijai un karjeras mērķiem.</p>
        </div>
        <div class="flex justify-center">
            <img src="https://www.ziprecruiter.ie/intl_assets/images/uk/mobile_and_desktop_alerts.svg" class="flex justify-center max-w-full  h-auto">
        </div>
    </div>
</div>
</div>
    <section class="text-black body-font bg-whitem">
  <div class="container px-5  mx-auto">
   
    <div class="flex flex-wrap -m-4 text-center">
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"  class="text-main w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M18.125,15.804l-4.038-4.037c0.675-1.079,1.012-2.308,1.01-3.534C15.089,4.62,12.199,1.75,8.584,1.75C4.815,1.75,1.982,4.726,2,8.286c0.021,3.577,2.908,6.549,6.578,6.549c1.241,0,2.417-0.347,3.44-0.985l4.032,4.026c0.167,0.166,0.43,0.166,0.596,0l1.479-1.478C18.292,16.234,18.292,15.968,18.125,15.804 M8.578,13.99c-3.198,0-5.716-2.593-5.733-5.71c-0.017-3.084,2.438-5.686,5.74-5.686c3.197,0,5.625,2.493,5.64,5.624C14.242,11.548,11.621,13.99,8.578,13.99 M16.349,16.981l-3.637-3.635c0.131-0.11,0.721-0.695,0.876-0.884l3.642,3.639L16.349,16.981z"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-900">410+</h2>
          <p class="leading-relaxed">Vakances</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="text-main w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-900">21 000</h2>
          <p class="leading-relaxed">Atradusi darbu</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="text-main w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M10.219,1.688c-4.471,0-8.094,3.623-8.094,8.094s3.623,8.094,8.094,8.094s8.094-3.623,8.094-8.094S14.689,1.688,10.219,1.688 M10.219,17.022c-3.994,0-7.242-3.247-7.242-7.241c0-3.994,3.248-7.242,7.242-7.242c3.994,0,7.241,3.248,7.241,7.242C17.46,13.775,14.213,17.022,10.219,17.022 M15.099,7.03c-0.167-0.167-0.438-0.167-0.604,0.002L9.062,12.48l-2.269-2.277c-0.166-0.167-0.437-0.167-0.603,0c-0.166,0.166-0.168,0.437-0.002,0.603l2.573,2.578c0.079,0.08,0.188,0.125,0.3,0.125s0.222-0.045,0.303-0.125l5.736-5.751C15.268,7.466,15.265,7.196,15.099,7.03"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-900">85</h2>
          <p class="leading-relaxed">Verificētie uzņēmumi</p>
        </div>
      </div>
      <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
        <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
          <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="text-main w-12 h-12 mb-3 inline-block" viewBox="0 0 24 24">
            <path d="M15.94,10.179l-2.437-0.325l1.62-7.379c0.047-0.235-0.132-0.458-0.372-0.458H5.25c-0.241,0-0.42,0.223-0.373,0.458l1.634,7.376L4.06,10.179c-0.312,0.041-0.446,0.425-0.214,0.649l2.864,2.759l-0.724,3.947c-0.058,0.315,0.277,0.554,0.559,0.401l3.457-1.916l3.456,1.916c-0.419-0.238,0.56,0.439,0.56-0.401l-0.725-3.947l2.863-2.759C16.388,10.604,16.254,10.22,15.94,10.179M10.381,2.778h3.902l-1.536,6.977L12.036,9.66l-1.655-3.546V2.778z M5.717,2.778h3.903v3.335L7.965,9.66L7.268,9.753L5.717,2.778zM12.618,13.182c-0.092,0.088-0.134,0.217-0.11,0.343l0.615,3.356l-2.938-1.629c-0.057-0.03-0.122-0.048-0.184-0.048c-0.063,0-0.128,0.018-0.185,0.048l-2.938,1.629l0.616-3.356c0.022-0.126-0.019-0.255-0.11-0.343l-2.441-2.354l3.329-0.441c0.128-0.017,0.24-0.099,0.295-0.215l1.435-3.073l1.435,3.073c0.055,0.116,0.167,0.198,0.294,0.215l3.329,0.441L12.618,13.182z"></path>
          </svg>
          <h2 class="title-font font-medium text-3xl text-gray-900">12</h2>
          <p class="leading-relaxed">IT IR SPĒKS balvas</p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="bg-whitem">
<div class="pt-16 pb-8 mx-auto max-w-5xl px-4 sm:pt-24">
    <div class="text-center">
        <h1 class="text-5xl tracking-tight font-extrabold sm:text-5xl pb-3 md:pb-0 md:text-6xl">
            Atradi savu sapņa darbu jau tagad!
        </h1>
        <p class="mt-3 max-w-md mx-auto text-base text-gray-600 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
            <code class="text-gray-600 font-semibold">IT IR SPĒKS </code>
            <span>lideris sava joma</span>
        </p>
        <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
            <div class="rounded-md shadow">
                <a class="w-full text-white flex items-center justify-center px-8 py-4 border border-transparent text-base font-medium rounded-md  bg-main hover:bg-green-500 md:py-5  md:text-2xl md:px-10"
                    href="#">Izmēģiniet bezmaksas</a>
            </div>
        </div>
        </div>
    </div>
</div>


    </Welcome>
    <FooterAll></FooterAll>
</template>
