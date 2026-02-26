import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

// PrimeVue setup
import PrimeVue from 'primevue/config';
import Aura from '@primeuix/themes/aura';
import registerManualPrimeVue from './primevue-manual';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const corePages = import.meta.glob('./Pages/**/*.vue');
const modulePages = import.meta.glob('../../app-modules/**/resources/js/Pages/**/*.vue');

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    // resolve: async (name) => {
    //     for (const path in modulePages) {
    //         if (path.endsWith(`/${name}.vue`)) {
    //             return (await modulePages[path]()).default;
    //         }
    //     }
    //     for (const path in corePages) {
    //         if (path.endsWith(`/${name}.vue`)) {
    //             return (await corePages[path]()).default;
    //         }
    //     }
    //     throw new Error(`Page not found: ${name}`);
    // },
    resolve: async (name) => {
        // 1. Manejo de módulos (Ej: "Radicacion::Index")
        if (name.includes('::')) {
            const [module, page] = name.split('::');

            // Buscamos en el objeto modulePages (ajusta la ruta según tu glob)
            // Se asume que el path en glob es algo como "../../app-modules/Radicacion/resources/js/Pages/Index.vue"
            for (const path in modulePages) {
                if (path.includes(`/app-modules/${module}/`) && path.endsWith(`/${page}.vue`)) {
                    const pageModule = await modulePages[path]();
                    return pageModule.default;
                }
            }
        }

        // 2. Manejo de páginas core (comportamiento actual)
        for (const path in corePages) {
            if (path.endsWith(`/${name}.vue`)) {
                const pageModule = await corePages[path]();
                return pageModule.default;
            }
        }

        throw new Error(`Page not found: ${name}`);
    },
    setup({ el, App, props, plugin }) {
        const vueApp = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(PrimeVue, {
                ripple: true,
                theme: {
                    preset: Aura,
                    options: {
                        prefix: 'p',
                        darkModeSelector: 'false',
                        cssLayer: false
                    }
                }
            });

        registerManualPrimeVue(vueApp);

        vueApp.mount(el);
    },
    progress: {
        color: '#ff6600',
    },
});