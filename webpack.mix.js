let mix = require('laravel-mix');

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

mix // Laravel mix instance 

    // Authencation assets 
    .js('resources/assets/js/auth.js', 'public/js')
    .sass('resources/assets/sass/auth.scss', 'public/css')

    // Application (back-end assets)
    .copy('node_modules/admin-lte/dist/css/AdminLTE.min.css', 'public/css')
    .copy('node_modules/admin-lte/dist/css/skins/_all-skins.min.css', 'public/css')
    .copy('node_modules/admin-lte/dist/js/adminlte.min.js', 'public/css')

    // Application (front-end assets)
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');
