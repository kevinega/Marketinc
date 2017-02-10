process.env.DISABLE_NOTIFIER = true;

const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('login.scss')
       .sass('register.scss')
       .sass('reset-password.scss')
       .sass('admin-login.scss')
       .sass('admin-home.scss')
       .webpack('app.js');
});
