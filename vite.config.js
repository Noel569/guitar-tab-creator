import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/tabgenerator.js',
                'resources/js/tabplayer.js',
                'resources/js/buttons.js',
            ],
            refresh: true,
        }),
    ],
});
