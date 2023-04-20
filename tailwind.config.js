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
                "lightest-gray": "#fcfcfd",
                "dark-4": "#F6F6F7",
                "dark-20": "#E6E6E7",
                "dark-24": "#E5E5E5",
                "dark-60": "#808189",
                "dark-100": "#010414",
                "brand-glow": "#DBE8FB",
                "brand-primary": "#2029F3",
                "brand-secondary": "#0FBA68",
                "brand-tertiary": "#EAD621",
                "system-success": "#249E2C",
                "system-error": "#CC1E1E",
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require('tailwind-scrollbar'),
    ],
}
