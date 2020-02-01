const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .sass('resources/sass/frontend.scss', 'public/css/frontend.min.css')
    .sass('resources/sass/backend.scss', 'public/css/backend.min.css')
    .js('resources/js/frontend.js', 'public/js/frontend.min.js')
    .js('resources/js/backend.js', 'public/js/backend.min.js')
    .options({

        processCssUrls: false
    });;


