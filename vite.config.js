import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // CSS Files
                'resources/css/bootstrap.min.css',
                'resources/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
                'resources/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css',
                'resources/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css',
                'resources/css/icons.min.css',
                'resources/css/app.min.css',
                'resources/css/custom.css',
                'resources/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css',
                'resources/libs/dropzone/dropzone.css',

                // JavaScript Files (Core Libraries)
                'resources/libs/jquery/jquery.min.js',
                'resources/libs/bootstrap/js/bootstrap.bundle.min.js',
                'resources/libs/metismenu/metisMenu.min.js',
                'resources/libs/simplebar/simplebar.min.js',
                'resources/libs/node-waves/waves.min.js',

                // DataTables JavaScript
                'resources/libs/datatables.net/js/jquery.dataTables.min.js',
                'resources/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'resources/libs/datatables.net-buttons/js/dataTables.buttons.min.js',
                'resources/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js',
                'resources/libs/jszip/jszip.min.js',
                'resources/libs/pdfmake/build/pdfmake.min.js',
                'resources/libs/pdfmake/build/vfs_fonts.js',
                'resources/libs/datatables.net-buttons/js/buttons.html5.min.js',
                'resources/libs/datatables.net-buttons/js/buttons.print.min.js',
                'resources/libs/datatables.net-buttons/js/buttons.colVis.min.js',
                'resources/libs/datatables.net-responsive/js/dataTables.responsive.min.js',
                'resources/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',

                // Other Libraries
                'resources/libs/apexcharts/apexcharts.min.js',
                'resources/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
                'resources/libs/dropzone/dropzone-min.js',

                // Custom Scripts
                'resources/js/plugin.js',
                'resources/js/pages/datatables.init.js',
                'resources/js/pages/dashboard.init.js',
                'resources/js/pages/project-create.init.js',
                'resources/js/pages/profile.init.js',
                'resources/js/ajax/profile/add.js',
                'resources/js/ajax/menu/add.js',
                'resources/js/ajax/menu/menu-add.js',
                'resources/js/ajax/merchant/merchantjs.js',
                'resources/js/ajax/merchant/merchantTwoJs.js',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    assetsInclude: ['**/*.woff', '**/*.woff2', '**/*.ttf', '**/*.eot', '**/*.svg'],
});
