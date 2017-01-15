const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix.sass('app.scss')
       .webpack('app.js')
       .webpack('backend.js')
       .copy('node_modules/slick-carousel/slick/slick.css', 'public/css')
       .copy('node_modules/bootstrap-toggle/css/bootstrap2-toggle.min.css', 'public/css')
       .copy('node_modules/bootstrap-colorpicker/dist/img/bootstrap-colorpicker/**', 'public/img/bootstrap-colorpicker')
       .copy('node_modules/tinymce/skins/lightgray/**', 'public/js/skins/lightgray')
       .copy('node_modules/font-awesome/fonts/**', 'public/fonts');
});
