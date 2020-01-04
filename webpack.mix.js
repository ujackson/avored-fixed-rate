let mix = require('laravel-mix')

mix.setPublicPath('dist')
    .js('resources/js/fixed-rate.js', 'js/fixed-rate.js')
