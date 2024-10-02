const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'dist')
   .sass('resources/sass/app.scss', 'dist')
   .setPublicPath('dist'); 