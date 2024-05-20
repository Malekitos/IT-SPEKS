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
          'main':' #4CAF50',
          'second':'#d9f99d',
          'accent':'#34d399',
          'whitem':'#FFFAFA',          
        }
      },
    },
    plugins: [
      require('daisyui'),
      require('flowbite/plugin')
    ],
  }