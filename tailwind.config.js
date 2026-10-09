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
        primary: {
          dark: '#0B2533', // Warna gelap ala sidebar SIMPATI
          DEFAULT: '#008559', // Warna hijau tombol/aksen SIMPATI
        }
      }
    },
  },
  plugins: [],
}