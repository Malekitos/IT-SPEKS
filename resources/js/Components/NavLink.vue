<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'mt-1 inline-flex items-center px-1 border-t-4 border-main text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-main transition duration-150 ease-in-out'
        : 'mt-1 inline-flex items-center px-1 border-t-4 border-gray-300 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-second focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
