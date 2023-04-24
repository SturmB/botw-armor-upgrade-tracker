const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'botw-beige': '#fdffe0',
                'botw-lightgreen': '#92c582',
                'botw-cyan': '#86a5a9',
                'botw-gray': '#767676',
                'botw-darkgreen': '#536f50',
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
