// webpack.mix.js

const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .copy('resources/css/styles.css', 'public/css');

   