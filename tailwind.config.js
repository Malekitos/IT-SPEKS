/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
          'main':'#84cc16',
          'second':'#d9f99d',
          'accent':'#34d399',          
        }
      },
    },
    plugins: [],
  }