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
                purple:{
                    950:'#4F3F6D',
                },
                yellow:{
                    50:'#fefce8',
                    100:'#fef9c3',
                    200:'#fef08a',
                    300:'#fde047',
                    400:'#facc15',
                    500:'#eab308',
                    600:'#ca8a04',
                    700:'#a16207',
                    800:'#854d0e',
                    900:'#B29C73',
                    950:'#B29C73',
                },
            },

            fontFamily: {
                'poppins': ['Poppins', 'sans-serif'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
    plugins: [require('flowbite/plugin')]
}

};
