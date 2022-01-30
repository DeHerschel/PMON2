const colors = require('tailwindcss/colors');
module.exports = {
    safelist: [
        {
            pattern: /bg-(red|green|blue)-(100|200|300|400|500|600|700|800|900)/,
            variants: [ 'lg' ],
        },
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
  theme: {
    extend:  {}
  },
  plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
}
