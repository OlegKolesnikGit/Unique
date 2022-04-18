const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'resources/assets/manager/plugins/fontawesome-free/css/all.css',
    'resources/assets/manager/css/adminlte.css'
], 'public/assets/manager/css/manager.css');

mix.scripts([
    'resources/assets/manager/plugins/jquery/jquery.min.js',
    'resources/assets/manager/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/assets/manager/js/adminlte.js',
    'resources/assets/manager/js/demo.js',
    'resources/assets/manager/js/main.js'
], 'public/assets/manager/js/manager.js');

mix.copyDirectory('resources/assets/manager/plugins/fontawesome-free/webfonts', 'public/assets/manager/webfonts');

mix.copyDirectory('resources/assets/manager/img', 'public/assets/manager/img');
