/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/js/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
    ],
    safelist: [
        'bg-gray-300', 'bg-red-300', 'bg-blue-300', 'bg-amber-300', 'bg-green-300'
    ],
    theme: {
        extend: {
            fontFamily: {
                'sans': ['Inter, sans-serif'],
            },
            colors: {
                'primary': 'hsla(0, 69%, 39%)'
            },
            spacing: {
                //
            },
            maxWidth: {
                '8xl': '1440px'
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require('tailwind-scrollbar'),
        require('tailwindcss-animated'),
        require('tailwindcss-debug-screens')
    ],
}
