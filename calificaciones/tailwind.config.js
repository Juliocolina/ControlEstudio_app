// tailwind.config.js
export default {
  darkMode: 'class', // Activa el modo oscuro solo si <html class="dark">
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {},
  },
  plugins: [require('daisyui')],

}
