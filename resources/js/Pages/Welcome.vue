<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import "vue3-toastify/dist/index.css";

const notify = () => {
    toast("Jūsu pieteikums ir veiksmīgi nosūtīts", {
  "theme": "auto",
  "type": "success",
  "dangerouslyHTMLString": true
});
  return { notify };
};

const showingNavigationDropdown = ref(false);


defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

</script>

<!--
<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link KOMENT
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>KOMENT

                        </template>
                    </nav>
                </header>


                
            </div>
        </div>
    </div>

</template>
-->

<template>
    <transition
  enter-active-class="transition-opacity duration-300 ease-out"
  enter-from-class="opacity-0"
  enter-to-class="opacity-100"
  leave-active-class="transition-opacity duration-200 ease-in"
  leave-from-class="opacity-100"
  leave-to-class="opacity-0"
>
  <!-- Ваш контент здесь -->

  
    
 <!-- Это навигация если че, кто не знал -->
    <div>
        <div class="min-h-screen bg-slate-200">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <!-- <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo
                                        class="block h-9 w-auto fill-current text-gray-800"
                                    />
                                </Link>
                            </div> -->

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    Sakums
                                </NavLink>
                                <NavLink :href="route('vakances')" :active="route().current('vakances')">
                                    Vakances
                                </NavLink>
                                <NavLink :href="route('jaunumi')" :active="route().current('jaunumi')">
                                    Jaunumi
                                </NavLink>
                                <NavLink :href="route('parmums')" :active="route().current('parmums')">
                                    Par Mums
                                </NavLink>
                                <NavLink v-if="$page.props.auth.user" :href="route('vakanceskontrole')" :active="route().current('vakanceskontrole')">
                                    Admin Sadala
                                </NavLink>
                            </div>
                        </div>

                  



                        <!-- LOGIN KNOPKA -->

                        <header class="grid grid-cols-2 items-center gap-2 lg:grid-cols-3">
                           
                            <nav v-if="!$page.props.auth.user" class="mx-3 flex flex-1 justify-end">
                                    <Link
                                        :href="route('login')"
                                        class="rounded-md px-3 py-2 text-gray-400   transition hover:text-main focus:outline-none focus-visible:ring-[#FF2D20]"
                                    >
                                        Log in 
                                    </Link>
                            </nav>
                            <nav v-if="!$page.props.auth.user" class="mx-3 flex flex-1 justify-end">
                                    <Link
                                        :href="route('register')"
                                        class="rounded-md px-3 py-2 text-gray-400   transition hover:text-main focus:outline-none focus-visible:ring-[#FF2D20]"
                                    >
                                        Register 
                                    </Link>
                            </nav>
                       
                                 <!-- ИМЯ ПОЛЬЗОВАТЕЛЯ КОГДА ОН ЗАЛОГИНИЛСЯ -->
                            
                        </header>  
                        <div v-if="$page.props.auth.user" class="hidden sm:flex sm:items-center sm:ms-6 ">
                            <!-- Settings Dropdown -->
                            <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <!-- Settings Dropdown -->
                            <div class="ms-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ms-2 -me-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            >
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Sakums
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('vakances')" :active="route().current('vakances')">
                                    Vakances
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('jaunumi')" :active="route().current('jaunumi')">
                                    Jaunumi
                        </ResponsiveNavLink>
                         <ResponsiveNavLink :href="route('parmums')" :active="route().current('parmums')">
                                    Par Mums
                        </ResponsiveNavLink>
                        <ResponsiveNavLink v-if="$page.props.auth.user" :href="route('vakanceskontrole')" :active="route().current('vakanceskontrole')">
                                    Admin Sadala
                        </ResponsiveNavLink>
                    </div>

                    
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="mx-auto">
                <slot />
            </main>
        </div>
    </div>
</transition>
</template>
