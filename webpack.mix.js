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

mix.js([
    'node_modules/jquery/dist/jquery.min.js',
    'node_modules/tablesorter/dist/js/jquery.tablesorter.js',
    'resources/assets/js/inside/global.js',
    'resources/assets/js/inside/home.js',
    'resources/assets/js/inside/performance_lab.js',
    'resources/assets/js/app.js'
],'public/js/app.js')
    .sourceMaps();

mix.sass('resources/assets/sass/app.scss', 'public/css');

mix.copy('resources/assets/images', 'public/images');

mix.copy('node_modules/tablesorter/dist/css/images', 'public/css/images');
