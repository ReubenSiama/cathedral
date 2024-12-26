/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./storage/framework/views/*.php",
    ],
    theme: {
        extend: {
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
    safelist: [
        {
          pattern: /max-w-(sm|md|lg|xl|2xl|3xl|4xl|5xl|6xl|7xl)/,
          variants: ['sm', 'md', 'lg', 'xl', '2xl']
        }
    ],
}
