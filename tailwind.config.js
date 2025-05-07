const plugin = require('tailwindcss/plugin');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
    "./vendor/tales-from-a-dev/flowbite-bundle/templates/**/*.html.twig",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    plugin(function({ addVariant }) {
      addVariant('turbo-frame', 'turbo-frame[src] &')
    }),
  ],
}
