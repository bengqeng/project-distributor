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

// MIX MEMBER
mix.sass('resources/sass/member/member.scss', 'public/css/member');
mix.js('resources/js/member/member.js', 'public/js/member');
mix.css('resources/css/member/adminlte.css', 'public/css/member');
// END OF MIX ADMIN

// COMBINE MEMBER CSS
mix.styles([
    'public/css/member/adminlte.css',
    'public/css/member/admin.css'
], 'public/css/member/master_member.css');
// END OF COMBINE MEMBER CSS

// COPY VENDOR LOGIN & REGISTER IMG File
mix.copyDirectory('resources/vendor/img/login-register', 'public/vendor/img/login-register');
// END OFCOPY VENDOR LOGIN & REGISTER IMG File

// MIX LOGIN & REGISTER
mix.sass('resources/sass/login-register/login.scss', 'public/css/login-register');
mix.sass('resources/sass/login-register/register.scss', 'public/css/login-register');
mix.js('resources/js/login-register/login.js', 'public/js/login-register');
mix.js('resources/js/login-register/register.js', 'public/js/login-register');
// END OF MIX ADMIN

// COMBINE LOGIN & REGISTER CSS
mix.styles([
    'public/css/login-register/login.css',
    'public/css/login-register/register.css'
], 'public/css/login-register/master_login-register.css');
// END OF COMBINE LOGIN & REGISTER CSS
