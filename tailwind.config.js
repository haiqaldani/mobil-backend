module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './public/**/*.css',
        './public/**/*.js',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            fontFamily: { sans: ['Inter var'] },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/ui'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require('tailwindcss'),
        // require('autoprefixer'),
    ]
}
