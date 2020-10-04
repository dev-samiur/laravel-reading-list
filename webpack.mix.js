const mix = require('laravel-mix');
const glob = require('glob');
const path = require('path');
const ReplaceInFileWebpackPlugin = require('replace-in-file-webpack-plugin');
const rimraf = require('rimraf');

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

// Default
mix.js('resources/js/app.js', 'public/js').scripts('resources/js/config.js', 'public/js/config.js').sass('resources/sass/app.scss', 'public/css');

// Global jquery
// mix.autoload({
// 'jquery': ['$', 'jQuery'],
// Popper: ['popper.js', 'default'],
// });

// 3rd party plugins css/js
mix.sass('resources/plugins/plugins.scss', 'public/plugins/global/plugins.bundle.css').then(() => {
    // remove unused preprocessed fonts folder
    rimraf(path.resolve('public/fonts'), () => {});
    rimraf(path.resolve('public/images'), () => {});
}).sourceMaps(!mix.inProduction())
    // .setResourceRoot('./')
    .options({processCssUrls: false}).js(['resources/plugins/plugins.js'], 'public/plugins/global/plugins.bundle.js');

// Metronic css/js
mix.sass('resources/metronic/sass/style.scss', 'public/css/style.bundle.css', {
    sassOptions: {includePaths: ['node_modules']},
})
    // .options({processCssUrls: false})
    .js('resources/js/scripts.js', 'public/js/scripts.bundle.js');

// Custom 3rd party plugins
(glob.sync('resources/plugins/custom/**/*.js') || []).forEach(file => {
    mix.js(file, `public/${file.replace('resources/', '').replace('.js', '.bundle.js')}`);
});
(glob.sync('resources/plugins/custom/**/*.scss') || []).forEach(file => {
    mix.sass(file, `public/${file.replace('resources/', '').replace('.scss', '.bundle.css')}`);
});

// Metronic css pages (single page use)
(glob.sync('resources/metronic/sass/pages/**/!(_)*.scss') || []).forEach(file => {
    file = file.replace(/[\\\/]+/g, '/');
    mix.sass(file, file.replace('resources/metronic/sass', 'public/css').replace(/\.scss$/, '.css'));
});

// Metronic js pages (single page use)
(glob.sync('resources/metronic/js/pages/**/*.js') || []).forEach(file => {
    mix.js(file, `public/${file.replace('resources/metronic/', '')}`);
});

// Metronic media
mix.copyDirectory('resources/metronic/media', 'public/media');

// Metronic theme
(glob.sync('resources/metronic/sass/themes/**/!(_)*.scss') || []).forEach(file => {
    file = file.replace(/[\\\/]+/g, '/');
    mix.sass(file, file.replace('resources/metronic/sass', 'public/css').replace(/\.scss$/, '.css'));
});

mix.webpackConfig({
    plugins: [
        new ReplaceInFileWebpackPlugin([
            {
                // rewrite font paths
                dir: path.resolve('public/plugins/global'),
                test: /\.css$/,
                rules: [
                    {
                        // fontawesome
                        search: /url\((\.\.\/)?webfonts\/(fa-.*?)"?\)/g,
                        replace: 'url(./fonts/@fortawesome/$2)',
                    },
                    {
                        // flaticon
                        search: /url\(("?\.\/)?font\/(Flaticon\..*?)"?\)/g,
                        replace: 'url(./fonts/flaticon/$2)',
                    },
                    {
                        // flaticon2
                        search: /url\(("?\.\/)?font\/(Flaticon2\..*?)"?\)/g,
                        replace: 'url(./fonts/flaticon2/$2)',
                    },
                    {
                        // keenthemes fonts
                        search: /url\(("?\.\/)?(Ki\..*?)"?\)/g,
                        replace: 'url(./fonts/keenthemes-icons/$2)',
                    },
                    {
                        // lineawesome fonts
                        search: /url\(("?\.\.\/)?fonts\/(la-.*?)"?\)/g,
                        replace: 'url(./fonts/line-awesome/$2)',
                    },
                    {
                        // socicons
                        search: /url\(("?\.\.\/)?font\/(socicon\..*?)"?\)/g,
                        replace: 'url(./fonts/socicon/$2)',
                    },
                ],
            },
        ]),
    ],
});

// Webpack.mix does not copy fonts, manually copy
(glob.sync('resources/metronic/plugins/**/*.+(woff|woff2|eot|ttf)') || []).forEach(file => {
    var folder = file.match(/resources\/metronic\/plugins\/(.*?)\//)[1];
    mix.copy(file, `public/plugins/global/fonts/${folder}/${path.basename(file)}`);
});
(glob.sync('node_modules/+(@fortawesome|socicon|line-awesome)/**/*.+(woff|woff2|eot|ttf)') || []).forEach(file => {
    var folder = file.match(/node_modules\/(.*?)\//)[1];
    mix.copy(file, `public/plugins/global/fonts/${folder}/${path.basename(file)}`);
});

// Optional: Import datatables.net
mix.scripts([
    'node_modules/datatables.net/js/jquery.dataTables.js',
    'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
    'node_modules/datatables.net-autofill/js/dataTables.autoFill.min.js',
    'node_modules/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js',
    'node_modules/jszip/dist/jszip.min.js',
    'node_modules/pdfmake/build/pdfmake.min.js',
    'node_modules/pdfmake/build/vfs_fonts.js',
    'node_modules/datatables.net-buttons/js/dataTables.buttons.min.js',
    'node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
    'node_modules/datatables.net-buttons/js/buttons.colVis.js',
    'node_modules/datatables.net-buttons/js/buttons.flash.js',
    'node_modules/datatables.net-buttons/js/buttons.html5.js',
    'node_modules/datatables.net-buttons/js/buttons.print.js',
    'node_modules/datatables.net-colreorder/js/dataTables.colReorder.min.js',
    'node_modules/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js',
    'node_modules/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
    'node_modules/datatables.net-keytable/js/dataTables.keyTable.min.js',
    'node_modules/datatables.net-responsive/js/dataTables.responsive.min.js',
    'node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
    'node_modules/datatables.net-rowgroup/js/dataTables.rowGroup.min.js',
    'node_modules/datatables.net-rowreorder/js/dataTables.rowReorder.min.js',
    'node_modules/datatables.net-scroller/js/dataTables.scroller.min.js',
    'node_modules/datatables.net-select/js/dataTables.select.min.js',
], 'public/plugins/custom/datatables/datatables.bundle.js');
mix.styles([
    'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
    'node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css',
    'node_modules/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css',
    'node_modules/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css',
    'node_modules/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css',
    'node_modules/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css',
    'node_modules/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css',
    'node_modules/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
    'node_modules/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css',
    'node_modules/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css',
    'node_modules/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css',
    'node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css',
], 'public/plugins/custom/datatables/datatables.bundle.css');

//frontend

mix.scripts('resources/frontend/js/bootsnav.js', 'public/js/frontend/bootsnav.js')
    .scripts('resources/frontend/js/bootstrap.bundle.js', 'public/js/frontend/bootstrap.bundle.js')
    .scripts('resources/frontend/js/bootstrap.bundle.js.map', 'public/js/frontend/bootsrap.bundle.js.map')
    .scripts('resources/frontend/js/classie.js', 'public/js/frontend/classie.js')
    .scripts('resources/frontend/js/counter.js', 'public/js/frontend/counter.js')
    .scripts('resources/frontend/js/hamburger-menu.js', 'public/js/frontend/hamburger-menu.js')
    .scripts('resources/frontend/js/html5shiv.js', 'public/js/frontend/html5shiv.js')
    .scripts('resources/frontend/js/imagesloaded.pkgd.min.js', 'public/js/frontend/imagesloaded.pkgd.min.js')
    .scripts('resources/frontend/js/instafeed.min.js', 'public/js/frontend/instafeed.min.js')
    .scripts('resources/frontend/js/isotope.pkgd.min.js', 'public/js/frontend/isotope.pkgd.min.js')
    .scripts('resources/frontend/js/jquery.js', 'public/js/frontend/jquery.js')
    .scripts('resources/frontend/js/jquery.appear.js', 'public/js/frontend/jquery.appear.js')
    .scripts('resources/frontend/js/jquery.count-to.js', 'public/js/frontend/jquery.count-to.js')
    .scripts('resources/frontend/js/jquery.easing.1.3.js', 'public/js/frontend/jquery.easing.1.3.js')
    .scripts('resources/frontend/js/jquery.easypiechart.min.js', 'public/js/frontend/jquery.easypiechart.min.js')
    .scripts('resources/frontend/js/jquery.fitvids.js', 'public/js/frontend/jquery.fitvids.js')
    .scripts('resources/frontend/js/jquery.magnific-popup.min.js', 'public/js/frontend/jquery.magnific-popup.min.js')
    .scripts('resources/frontend/js/jquery.nav.js', 'public/js/frontend/jquery.nav.js')
    .scripts('resources/frontend/js/jquery.stellar.js', 'public/js/frontend/jquery.stellar.js')
    .scripts('resources/frontend/js/justified-gallery.min.js', 'public/js/frontend/justified-gallery.min.js')
    .scripts('resources/frontend/js/main.js', 'public/js/frontend/main.js')
    .scripts('resources/frontend/js/modernizr.js', 'public/js/frontend/modernizr.js')
    .scripts('resources/frontend/js/page-scroll.js', 'public/js/frontend/page-scroll.js')
    .scripts('resources/frontend/js/retina.min.js', 'public/js/frontend/retina.min.js')
    .scripts('resources/frontend/js/retina.min.js.map', 'public/js/frontend/retina.min.js.map')
    .scripts('resources/frontend/js/skill.bars.jquery.js', 'public/js/frontend/skill.bars.jquery.js')
    .scripts('resources/frontend/js/skrollr.min.js', 'public/js/frontend/skrollr.min.js')
    .scripts('resources/frontend/js/smooth-scroll.js', 'public/js/frontend/smooth-scroll.js')
    .scripts('resources/frontend/js/swiper.min.js', 'public/js/frontend/swiper.min.js')
    .scripts('resources/frontend/js/swiper.min.js.map', 'public/js/frontend/swiper.min.js.map')
    .scripts('resources/frontend/js/wow.min.js', 'public/js/frontend/wow.min.js');

mix.styles('resources/frontend/css/animate.css', 'public/css/frontend/animate.css')
    .styles('resources/frontend/css/bootstrap.min.css', 'public/css/frontend/bootstrap.min.css')
    .styles('resources/frontend/css/bootstrap.min.css.map', 'public/css/frontend/bootstrap.min.css.map')
    .styles('resources/frontend/css/magnific-popup.css', 'public/css/frontend/magnific-popup.css')
    .styles('resources/frontend/css/responsive.css', 'public/css/frontend/responsive.css')
    .styles('resources/frontend/css/style.css', 'public/css/frontend/style.css')
    .styles('resources/frontend/css/bootsnav.css', 'public/css/frontend/bootsnav.css')
    .styles('resources/frontend/css/et-line-icons.css', 'public/css/frontend/et-line-icons.css')
    .styles('resources/frontend/css/font-awesome.min.css', 'public/css/frontend/font-awesome.min.css')
    .styles('resources/frontend/css/justified-gallery.min.css', 'public/css/frontend/justified-gallery.min.css')
    .styles('resources/frontend/css/swiper.min.css', 'public/css/frontend/swiper.min.css')
    .styles('resources/frontend/css/themify-icons.css', 'public/css/frontend/themify-icons.css');