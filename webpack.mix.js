let mix = require('laravel-mix');
const SVGSpritemapPlugin = require('svg-spritemap-webpack-plugin')
const svgo = require('svgo')
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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.webpackConfig({
  plugins: [
    new SVGSpritemapPlugin({
      src: 'resources/assets/svg/*.svg',
      filename: 'images/symbols.svg',
      svgo: {
        plugins: [
          {
            removeTitle: true,
            mergePaths: true,
            convertTransform: true,
            removeUselessStrokeAndFill: true,
            collapseGroups: true
          }
        ]
      }
    })
  ]
})
