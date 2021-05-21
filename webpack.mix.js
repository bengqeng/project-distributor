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
    .sourceMaps();

mix.sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin/admin.scss', 'public/css/admin');

mix.js('resources/js/admin/admin.js', 'public/js/admin');
mix.css('resources/css/admin/adminlte.css', 'public/css/admin');

// COMBINE ADMIN CSS
mix.styles([
    'public/css/admin/adminlte.css',
    'public/css/admin/admin.css'
], 'public/css/admin/master_admin.css');
// END OF COMBINE ADMIN CSS