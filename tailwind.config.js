const { iconsPlugin, getIconCollections } = require("@egoist/tailwindcss-icons")

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  safelist: [
    'hover:text-background',
    'hover:bg-tersier',
    'text-yellow-500'
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '2rem',
        lg: '4rem',
        xl: '5rem',
        '2xl': '6rem',
      },
    },
    extend: {
      fontFamily: {
        lora: ["Lora", "serif"],
        roboto: ["Roboto", "sans-serif"]
      },
      colors: {
        primary: "#121212",
        secondary: "#E5E7EB",
        tersier: "#007BFF",
        background: "#F5F5F5"
      }
    },
  },
  plugins: [
    iconsPlugin({
      collections: getIconCollections(["mdi"]),
    }),
  ],
}

