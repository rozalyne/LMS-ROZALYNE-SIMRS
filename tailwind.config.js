import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: false, // Disable dark mode

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
                pink: {
                    100: '#fbcfe8',  // Light pink
                    200: '#f9a8d4',  // Medium light pink
                    300: '#f472b6',  // Medium pink
                    400: '#ec4899',  // Darker pink
                    500: '#db2777',  // Strong pink
                    600: '#be185d',  // Dark pink
                    700: '#9d174d',  // Darker shade
                    800: '#831843',  // Even darker shade
                    900: '#6b1f3d',  // Very dark shade
                },
            },
        },
    },

    plugins: [forms],
};
