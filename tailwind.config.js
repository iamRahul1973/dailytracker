const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Noto Sans', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],

    safelist: [
        'bg-gray-500',
        'bg-purple-500',
        'bg-pink-500',
        'bg-red-500',
        'bg-green-500',
        'bg-green-300',
        'bg-blue-300',
        'bg-red-300',
        'bg-yellow-300',
        'border-green-500',
        'border-blue-500',
        'border-red-500',
        'border-yellow-500',
        'text-green-700',
        'text-green-500',
        'text-blue-700',
        'text-blue-500',
        'text-red-700',
        'text-red-500',
        'text-yellow-700',
        'text-yello-500',
    ]
};
