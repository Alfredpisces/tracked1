import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php', // This tells Tailwind to scan your Blade files!
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // You can define custom brand colors here!
                brand: {
                    light: '#fca5a5',
                    DEFAULT: '#ef4444', // A nice red
                    dark: '#b91c1c',
                }
            }
        },
    },

    plugins: [forms],
};
