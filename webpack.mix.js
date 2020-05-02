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
   .sass('resources/sass/app.scss', 'public/css');


mix.styles([
    'public/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css',
    'public/assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css',
    'public/assets/plugins/OwlCarousel2-2.2.1/animate.css',
    'public/assets/styles/comun.css'
], 'public/css/all.css');

mix.scripts([
    'public/assets/plugins/greensock/TweenMax.min.js',
    'public/assets/plugins/greensock/TimelineMax.min.js',
    'public/assets/plugins/scrollmagic/ScrollMagic.min.js',
    'public/assets/plugins/greensock/animation.gsap.min.js',
    'public/assets/plugins/greensock/ScrollToPlugin.min.js ',
    'public/assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js',
    'public/assets/plugins/easing/easing.js',
    'public/assets/plugins/progressbar/progressbar.min.js ',
    'public/assets/plugins/parallax-js-master/parallax.min.js',
    'public/assets/js/custom.js'
], 'public/js/all.js');












