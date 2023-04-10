/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "dark-20": "#E6E6E7",
                "dark-60": "#808189",
                "dark-100": "#010414",
                "brand-primary" : "#2029F3",
                "brand-glow" : "#DBE8FB",
                "brand-secondary" : "#0FBA68",
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
}
