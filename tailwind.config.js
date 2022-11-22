const defaultTheme = require('tailwindcss/defaultTheme')
module.exports = {
    content: [
        "./src/**/*.{html,js}",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js',
    ],

    theme: {
        extend: {
            colors:{
                'orange': '#f97316'
                
                
            },

            fontFamily: {
                'Poppins': ['Poppins', 'sans-serif'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
    plugins: [require('flowbite/plugin')]
}

};
