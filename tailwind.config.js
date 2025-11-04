import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography'; // <-- AJOUTE CET IMPORT

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': {
                    '50': '#FFFBEB',
                    '100': '#FFF6D6',
                    '200': '#FFEDAB',
                    '300': '#FFE480',
                    '400': '#FFD755',
                    '500': '#FFC42A',
                    '600': '#FF9800',
                    '700': '#E68A00',
                    '800': '#CC7A00',
                    '900': '#B36A00',
                    '950': '#995A00',
                },
            },
        },
    },

    plugins: [
        forms,
        typography
    ],
};
