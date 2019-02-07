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
    .scripts([
        './node_modules/jquery/dist/jquery.js',
        './node_modules/bootstrap/dist/js/bootstrap.bundle.js',
        './node_modules/jquery.easing/jquery.easing.js',
        './node_modules/startbootstrap-resume/js/resume.js'
    ], 'public/js/vendor.js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('./node_modules/startbootstrap-resume/scss/resume.scss', 'public/css/theme.css')
    .version();
