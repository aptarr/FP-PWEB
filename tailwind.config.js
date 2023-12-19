import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

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
            left: {
                '120': '30rem',
                '180': '45rem',
                '270': '53rem',
                'custom-1': '70rem',
            },
            width: {
                '120': '30rem',
                '150': '40rem',
                '180': '45rem',
                '240': '60rem',
                '300': '75rem',
                '330': '82.5rem',
                '360': '90rem',
                'custom-1': '70rem',
                '1/7': '14.2857%',
            },
            margin: {
                '120': '30rem',
                '180': '45rem',
            },
            height: {
                '80': '20rem',
                '90': '22.5rem',
                '120': '30rem',
                '150': '38rem',
                '180': '45rem',
            },
            fontSize: {
                '4xl': '2.441rem',
                '5xl': '3.052rem',
            },
            minHeight: {
                '800': '800px',
            },
        },
    },

    plugins: [forms],

};

