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
        extend: {},
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('tailwindcss'),
        require('@tailwindcss/forms'),
        // require('autoprefixer'),
    ]
}
