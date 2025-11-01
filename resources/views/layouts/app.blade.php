<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8" />
    <title>Dashboard | {{ env('APP_NAME') }} - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/')}}admin/assets/images/favicon.ico">

    @vite([
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
    ])
</head>
    <body data-sidebar="dark">

        <div id="layout-wrapper">
            @livewire('navigation-menu')
{{--                @include('pages.partials.menu.left.left')--}}
            <!-- Page Content -->
            {{-- formCategory.blade.php--}}
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

        <!-- Transaction Modal -->
        <div class="modal fade transaction-detailModal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                        <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap">
                                <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        <div>
                                            <img src="{{asset('/')}}/admin/assets/images/product/img-7.png" alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                            <p class="text-muted mb-0">$ 225 x 1</p>
                                        </div>
                                    </td>
                                    <td>$ 255</td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div>
                                            <img src="{{asset('/')}}/admin/assets/images/product/img-4.png" alt="" class="avatar-sm">
                                        </div>
                                    </th>
                                    <td>
                                        <div>
                                            <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                            <p class="text-muted mb-0">$ 145 x 1</p>
                                        </div>
                                    </td>
                                    <td>$ 145</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Sub Total:</h6>
                                    </td>
                                    <td>
                                        $ 400
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Shipping:</h6>
                                    </td>
                                    <td>
                                        Free
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <h6 class="m-0 text-right">Total:</h6>
                                    </td>
                                    <td>
                                        $ 400
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->

        <!-- subscribeModal -->
        @include('layouts.modal')
        <!-- end modal -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear());
                            {{--const url = "{{ route('profile.store') }}";--}}
                            {{--const getProfileEditUrl = "{{ route('getProfile.Details')  }}";--}}

                        </script> © Skote.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design & Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        @stack('modals')

        <!-- Modal -->
        <div class="modal fade" id="edit-Page" tabindex="-1" aria-labelledby="editPageModal" aria-hidden="true">
            <div class="modal-dialog">
                <form id="editPage" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="modal-content">
                        <div id="edit-error" class="alert alert-danger" style="display: none">
                            <ul class="mb-0"></ul>
                        </div>

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <!-- Name input -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" placeholder="Enter name" class="form-control" required>
                            </div>

                            <!-- Description textarea -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" name="description" placeholder="Enter description" class="form-control" rows="4" required></textarea>
                            </div>

                            <!-- Image input -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Image</label>
                                <input type="file" id="image" name="image" class="form-control" accept="image/*">
                                <img id="profileImage" src="" alt="Profile Image" class="mt-2 rounded" style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- Important: type="submit" for AJAX form submit -->
                            <button type="submit" class="btn btn-primary" id="updateProfileBtn">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



        <div class="modal fade" id="menu-Page" tabindex="-1" aria-labelledby="editPageModal" aria-hidden="true">
            <div class="modal-dialog">
                <form id="menuPage" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="modal-content">
                        <div id="edit-error" class="alert alert-danger" style="display: none">
                            <ul class="mb-0"></ul>
                        </div>

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <!-- Name input -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" placeholder="Enter name" class="form-control" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- Important: type="submit" for AJAX form submit -->
                            <button type="submit" class="btn btn-primary" id="updateMenuBtn">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="sub-category-page" tabindex="-1" aria-labelledby="editPageModal" aria-hidden="true">
            <div class="modal-dialog">
                <form id="subCategoryPage" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="modal-content">
                        <div id="edit-error" class="alert alert-danger" style="display: none">
                            <ul class="mb-0"></ul>
                        </div>

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <!-- Name input -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" placeholder="Enter name" class="form-control" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- Important: type="submit" for AJAX form submit -->
                            <button type="submit" class="btn btn-primary" id="updateMenuBtn">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        @livewireScripts

        <script>
            // profile
            const profileStoreUrl = "{{ route('profile.store') }}";
            const profileFetchUrl = "{{ route('profile.fetch') }}";
            const profileDestroyUrl = "{{ route('profile.destroy', ['id' => ':id']) }}";
            const profileEditUrl = "{{ route('profile.edit', ['id' => ':id']) }}";

            // menu Category
            const menuStoreUrl = "{{ route('menu.store') }}";
            const menuFetchUrl = "{{ route('menu.fetch') }}";
            const menuDestroyUrl = "{{ route('menu.destroy', ['id' => ':id']) }}";
            const menuEditUrl = "{{ route('menu.edit', ['id' => ':id']) }}";

            // menu Sub Category
            const subCategoryStoreUrl = "{{ route('subcategory.store') }}";
            const subCategoryFetchUrl = "{{ route('subcategory.fetch') }}";
            const subCategoryEditUrl = "{{ route('subcategory.edit', ['id' => ':id']) }}";
            const subCategoryDestroyUrl = "{{ route('subcategory.destroy', ['id' => ':id']) }}";

            // new menu create

            const menusStore = "{{ route('menus.store') }}";
            const menuFetch = "{{ route('menus.list') }}";

            // left side menu show
            const leftMenuShow = "{{ route('menus.fetch') }}";

        </script>
    </body>
</html>
