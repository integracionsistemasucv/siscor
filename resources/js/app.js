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
    resolve: async (name) => {
        for (const path in modulePages) {
            if (path.endsWith(`/${name}.vue`)) {
                return (await modulePages[path]()).default;
            }
        }
        for (const path in corePages) {
            if (path.endsWith(`/${name}.vue`)) {
                return (await corePages[path]()).default;
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
