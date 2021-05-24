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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix.setPublicPath('./')
    .copy('resources/static/website/index.html', 'static/website')
    .js('resources/static/website/js/app.js', 'static/website/js')
    .postCss('resources/static/website/css/app.css', 'static/website/css');