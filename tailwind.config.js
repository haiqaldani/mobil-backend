const colors = require("tailwindcss/colors");

module.exports = {
    purge: [
        "./resources/**/*.blade.php",
        "./public/**/*.css",
        "./public/**/*.js",
        "./resources/**/*.js",
        "./resources/**/*.vue"
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                "gray-soft": "#f7f7f7",
                "blue-default": "#423FF4",
                "default": "#F6F8FD",
                // gray: colors.gray,
            }
        },
        fontFamily: {
            'sans': ['Poppins', 'sans-serif'],
        },
        screens: {
            sm: '640px',
            // => @media (min-width: 640px) { ... }
      
            md: '768px',
            // => @media (min-width: 768px) { ... }
      
            lg: '1024px',
            // => @media (min-width: 1024px) { ... }
      
            xl: '1280px',
            // => @media (min-width: 1280px) { ... }
      
            '2xl': '1366px',
            // => @media (min-width: 1366px) { ... }
      
            '3xl': '1536px'
            // => @media (min-width: 1536px) { ... }
        },
        variants: {
            extend: {}
        },
        plugins: [
            require("@tailwindcss/ui"),
            require("@tailwindcss/forms"),
            require("@tailwindcss/typography"),
            require("@tailwindcss/aspect-ratio"),
            require("tailwindcss"),
            require("autoprefixer")
            // require('autoprefixer'),
        ]
    }
}
