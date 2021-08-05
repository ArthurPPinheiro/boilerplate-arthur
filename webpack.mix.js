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

// mix.copy('modules/Admin/Resources/assets/img', 'public/admin/img');
// mix.copy('modules/Admin/Resources/assets/fontawesome/webfonts', 'public/admin/webfonts');
// mix.copy('modules/Admin/Resources/assets/plugins/ckeditor', 'public/admin/ckeditor');

// mix.scripts([

//     'modules/Admin/Resources/assets/js/cropper.min.js',
//     'modules/Admin/Resources/assets/js/dropzone.js',
//     'modules/Admin/Resources/assets/js/jquery-3.1.0.min.js',
//     'modules/Admin/Resources/assets/plugins/pickadate/lib/picker.js',
//     'modules/Admin/Resources/assets/plugins/pickadate/lib/picker.date.js',
//     'modules/Admin/Resources/assets/plugins/taggle/src/taggle.js',
//     'modules/Admin/Resources/assets/plugins/jQuery/jquery-2.2.3.min.js',
//     'modules/Admin/Resources/assets/plugins/jQueryUI/jquery-ui.min.js',
//     'modules/Admin/Resources/assets/js/alertUtil.js',
//     // 'modules/Admin/Resources/assets/js/jquery.maskedinput.js',
//     // 'modules/Admin/Resources/assets/plugins/input-mask/jquery.inputmask.js',
//     // 'modules/Admin/Resources/assets/plugins/input-mask/jquery.maskMoney.min.js'

// ], 'public/admin/js/admin-header.js');

mix.copy('Modules/Admin/Resources/assets/img', 'public/adm/img');

mix.scripts([

    'Modules/Admin/Resources/assets/vendor/jquery/dist/jquery.min.js',
    'Modules/Admin/Resources/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
    'Modules/Admin/Resources/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js',
    'Modules/Admin/Resources/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js',
    'Modules/Admin/Resources/assets/vendor/chart.js/dist/Chart.min.js',
    'Modules/Admin/Resources/assets/vendor/chart.js/dist/Chart.extension.js',
    'Modules/Admin/Resources/assets/vendor/clipboard/dist/clipboard.min.js',

    'modules/Admin/Resources/assets/js/app.js',
    'modules/Admin/Resources/assets/js/argon.js',

    'modules/Admin/Resources/assets/js/components/charts/chart-bars.js',
    'modules/Admin/Resources/assets/js/components/charts/chart-line.js',
    'Modules/Admin/Resources/assets/js/components/custom/form-control.js',
    'Modules/Admin/Resources/assets/js/components/init/chart-init.js',
    'Modules/Admin/Resources/assets/js/components/init/copy-icon.js',
    'Modules/Admin/Resources/assets/js/components/init/navbar.js',
    'Modules/Admin/Resources/assets/js/components/init/popover.js',
    'Modules/Admin/Resources/assets/js/components/init/scroll-to.js',
    'Modules/Admin/Resources/assets/js/components/init/tooltip.js',
    'Modules/Admin/Resources/assets/js/components/maps/maps-default.js',


], 'public/adm/js/admin.js');

mix.styles([

    'Modules/Admin/Resources/assets/css/argon.css',
    // 'Modules/Admin/Resources/assets/css/bootstrap/bootstrap-grid.css',
    // 'Modules/Admin/Resources/assets/css/bootstrap/bootstrap-reboot.css',
    // 'Modules/Admin/Resources/assets/css/bootstrap/bootstrap.css',
    'Modules/Admin/Resources/assets/vendor/nucleo/css/nucleo.css',
    'Modules/Admin/Resources/assets/vendor/nucleo/css/nucleo.css',
    'Modules/Admin/Resources/assets/vendor/nucleo/css/nucleo-svg.css',
    'Modules/Admin/Resources/assets/css/all.css',
    'Modules/Admin/Resources/assets/scss/app.scss'

], 'public/adm/css/vendor-admin.css');

mix.sass('Modules/Admin/Resources/assets/scss/app.scss', 'public/adm/css/admin.css');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
