/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/js/**/*.js"
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
