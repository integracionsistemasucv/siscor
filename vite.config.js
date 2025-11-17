import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import Components from 'unplugin-vue-components/vite';
import { PrimeVueResolver } from 'unplugin-vue-components/resolvers';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        Components({
            // 👇 Esto habilita la auto‑importación de PrimeVue
            resolvers: [PrimeVueResolver()],
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
            '@modules': path.resolve(__dirname, 'app-modules'),
        },
    },
});
