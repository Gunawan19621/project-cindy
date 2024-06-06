import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        watch: {
            usePolling: true, // Tambahkan opsi ini untuk menangani perubahan file di lingkungan tertentu (seperti WSL)
            interval: 1000,
        },
    },
});
