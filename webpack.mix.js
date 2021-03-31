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
    .js('resources/js/parties/create.js', 'public/js')
    .js('resources/js/parties/game.js', 'public/js')
    .js('resources/js/parties/join.js', 'public/js')
    .js('resources/js/profile.js', 'public/js')
    .js('resources/js/characters.js', 'public/js')
    .js('resources/js/character_edit.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/style.scss', 'public/css')
    .sass('resources/sass/roll20Alternative.scss', 'public/css')
    .sass('resources/sass/game.scss', 'public/css')
    .sourceMaps();
