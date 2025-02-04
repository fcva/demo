import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import { createPinia } from 'pinia';
import { createRouter, createWebHistory } from 'vue-router';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
const pinia = createPinia(); // instancia de pinia creado

import Rol from '@/Pages/Roles/Rol.vue';

const routes = [
    { path: '/roles/rol', component: Rol },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});

createInertiaApp({

    title: (title) => `${title} - ${appName}`,
    
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    
        setup({ el, App, props, plugin }) {
        
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(pinia) // usando pinia
            .use(router) // usando router
            .mount(el);
    },
    
    progress: {
        color: '#4B5563',
    },
});
