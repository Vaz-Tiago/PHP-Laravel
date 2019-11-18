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
    //Site
    .styles([
        'resources/views/site/css/reset.css',
        'resources/views/site/css/style.css'
    ], 'public/site/css/style.css')
    
    .scripts([
        'resources/views/site/js/script.js'
    ], 'public/site/js/script.js')

    //Admin
    .styles([
        'resources/views/admin/css/style.css'
    ], 'public/admin/css/style.css')

    .scripts([
        'resources/views/admin/js/script.js'
    ], 'public/admin/js/script.js')
    
    .version();