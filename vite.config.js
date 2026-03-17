import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        origin: 'http://localhost:5174',
        cors: true,
        hmr: {
            host: 'localhost',
            port: 5173,
            clientPort: 5174,
            protocol: 'ws',
        },
        watch: {
            usePolling: true,
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/scss/app.scss',
                'resources/scss/doctor-calendar.scss',
            ],
            refresh: true,
        }),
    ],
});
