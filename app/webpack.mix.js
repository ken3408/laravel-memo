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

 mix.js('resources/js/app.js', 'public/js')
 .sass('resources/sass/app.scss', 'public/css')
 .sass('resources/sass/dashboard.scss', 'public/css')
 .sass('resources/sass/_d-wrap.scss', 'public/css')
 .sass('resources/sass/_d-header.scss', 'public/css')
 .sass('resources/sass/_d-container.scss', 'public/css')
 .sass('resources/sass/_d-container-left.scss', 'public/css')
 .sass('resources/sass/_d-container-right.scss', 'public/css')
 .sass('resources/sass/page-create.scss', 'public/css')
 .sass('resources/sass/note.scss', 'public/css')
 .sass('resources/sass/_n-show.scss', 'public/css')
 .sass('resources/sass/_n-create.scss', 'public/css')
 .sourceMaps();


