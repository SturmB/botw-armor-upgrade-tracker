const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    darkMode: "class",

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
                title: ["Rowdies", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'botw-beige': '#fdffe0',
                'botw-lightgreen': '#92c582',
                'botw-cyan': '#86a5a9',
                'botw-gray': '#767676',
                'botw-darkgreen': '#536f50',
                'botw-gold': '#b59c64',
                'botw-orange': {
                    50: '#fef4ea',
                    100: '#fde9d6',
                    200: '#fbd3ad',
                    300: '#fabd85',
                    400: '#f8a75c',
                    500: '#f79234',
                    600: '#c57429',
                    700: '#94571f',
                    800: '#623a14',
                    900: '#311d0a',
                    950: '#180e05',
                },
                'botw-green': {
                    50: '#f4f7ea',
                    100: '#e9f0d6',
                    200: '#d4e1ad',
                    300: '#bed284',
                    400: '#a9c35b',
                    500: '#94b533',
                    600: '#769028',
                    700: '#586c1e',
                    800: '#3b4814',
                    900: '#1d240a',
                    950: '#0e1205',
                },
                'botw-blue': {
                    50: '#e8f4fa',
                    100: '#d2eaf5',
                    200: '#a5d6eb',
                    300: '#78c2e2',
                    400: '#4baed8',
                    500: '#1f9acf',
                    600: '#187ba5',
                    700: '#125c7c',
                    800: '#0c3d52',
                    900: '#061e29',
                    950: '#030f14',
                },
                'botw-brown': {
                    50: '#f3edea',
                    100: '#e7dcd5',
                    200: '#d0baab',
                    300: '#b89881',
                    400: '#a17656',
                    500: '#8a542d',
                    600: '#6e4324',
                    700: '#52321b',
                    800: '#372112',
                    900: '#1b1009',
                    950: '#0d0804',
                },
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
