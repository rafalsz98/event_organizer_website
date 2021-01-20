const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.gallery.blade.php'],

    theme: {
        extend: {
            colors: {
                // TODO: Add new color palettes to event calendar tabs
                shortTab0: {
                    primary: '#F6F5AE',
                    secondary: '#ED7D3A'
                },
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
