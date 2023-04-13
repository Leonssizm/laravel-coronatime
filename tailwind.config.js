/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      opacity: {
        '8':'0.08',
      },
    },
  },
  plugins: [require('tailwindcss-font-inter')],
}

