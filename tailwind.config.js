import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import preset from './vendor/filament/support/tailwind.config.preset'
import typography from '@tailwindcss/typography';


/** @type {import('tailwindcss').Config} */




export default {
    presets: [preset],

    content: [

        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/components/*.blade.php',
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',


    ],
    darkMode: 'class', // Enable dark mode
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

        },
    },

    plugins: [forms, typography],

};