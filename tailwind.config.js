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
      backgroundImage: {
        'success': "url('../../public/assets/images/success.svg')"
      },
    },
  },
  plugins: [require('tailwindcss-font-inter')],
}

