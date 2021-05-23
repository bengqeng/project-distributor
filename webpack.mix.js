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

// MIX ADMIN
mix.sass('resources/sass/admin/admin.scss', 'public/css/admin');
mix.js('resources/js/admin/admin.js', 'public/js/admin');
mix.css('resources/css/admin/adminlte.css', 'public/css/admin');
// END OF MIX ADMIN

// COMBINE ADMIN CSS
mix.styles([
    'public/css/admin/adminlte.css',
    'public/css/admin/admin.css'
], 'public/css/admin/master_admin.css');
// END OF COMBINE ADMIN CSS

// COPY VENDOR ADMIN IMG File
mix.copyDirectory('resources/vendor/img/admin', 'public/vendor/img/admin');
// END OFCOPY VENDOR ADMIN IMG File

// MIX LANDINGPAGE
mix.sass('resources/sass/landingpage/landingpage.scss', 'public/css/landingpage');
mix.js('resources/js/landingpage/landingpage.js', 'public/js/landingpage');
// END OF MIX LANDINGPAGE