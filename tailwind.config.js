/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class', // 👈 bật chế độ dark theo class
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
