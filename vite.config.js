import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',

                'resources/css/components/navbar.css',
                'resources/css/components/footer.css',
                'resources/css/components/button.css',

                'resources/css/pages/index.css',
                'resources/css/pages/company/index.css',
                'resources/css/pages/services/index.css',
                'resources/css/pages/careers/index.css',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
