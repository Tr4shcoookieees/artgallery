import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    build: {
        target: 'esnext'
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/alpineStart.js',
                'resources/js/productsFilter.js',
                'resources/js/categoryChart.js'
            ],
            refresh: true,
        }),
    ],
});
