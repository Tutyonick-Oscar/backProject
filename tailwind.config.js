/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors :{
      white : '#fcfffc',
      grey : 'rgba(128, 128, 128, 0.897)',
      blue : '#2c3e50',
      gray : 'gray',
      blue_f :' #2d3a3a64'},
    extend: {},
  },
  plugins: [],
}

