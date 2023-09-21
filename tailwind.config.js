const defaultTheme = require('tailwindcss/defaultTheme');

const colors = require('tailwindcss/colors')

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'gold': '#EFB810',
                'dorado': '#FFD700',
                'beigee': '#43321e',
                trueGray: colors.trueGray,
                orange: colors.orange,
                sky: colors.sky,
                greenLime: colors.lime,
                transparent: 'transparent',
                current: 'currentColor',
                beige: {
                    50: '#fdfdfb',
                    100: '#fdfdfb',
                    200: '#fcfaf8',
                    300: '#faf8f4',
                    400: '#f7f3ed',
                    500: '#f6f1eb',
                    600: '#d7c2a7',
                    700: '#bb9668',
                    800: '#86653c',
                    900: '#43321e',
                    950: '#20180e',
                },
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};