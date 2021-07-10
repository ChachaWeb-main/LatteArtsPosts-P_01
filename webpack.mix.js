const mix = require('laravel-mix');

// npm run watch
// 上記コードを実行のうえCSSコーティングしないと反映されない。終了後は control + c で停止する。
// ※注 public内のcssファイルでなく、resources内のsassファイルでコーティングすること。

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
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin/style.scss', 'public/css');
