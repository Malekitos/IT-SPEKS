// Импортируем необходимые модули и компоненты
import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { createI18n } from 'vue-i18n';
import lv from './locales/lv.json';
import en from './locales/en.json';
import App from './App.vue'; 

// Создаем i18n instance
const i18n = createI18n({
    legacy: false,
    locale: 'lv',
    messages: {
        lv: lv,
        en: en,
    }
});

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// Создаем и настраиваем Inertia приложение
createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        // Создаем Vue приложение и используем необходимые плагины
        const app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(i18n); // Используем i18n

        app.mount(el); // Монтируем приложение

        return app; // Возвращаем приложение для возможного дальнейшего использования
    },
    progress: {
        color: '#4B5563',
    },
});
