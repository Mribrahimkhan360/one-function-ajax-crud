<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="utf-8" />
    <title>পোস্ট তৈরি | Skote - Admin & Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="প্রফেশনাল পোস্ট ম্যানেজমেন্ট ড্যাশবোর্ড" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    @vite([
    'resources/css/bootstrap.min.css',
    'resources/css/icons.min.css',
    'resources/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css',
    'resources/libs/dropzone/dropzone.css',
    'resources/css/app.min.css',
    'resources/js/plugin.js',
    'resources/libs/jquery/jquery.min.js',
    'resources/libs/bootstrap/js/bootstrap.bundle.min.js',
    'resources/libs/metismenu/metisMenu.min.js',
    'resources/libs/simplebar/simplebar.min.js',
    'resources/libs/node-waves/waves.min.js',
    'resources/libs/apexcharts/apexcharts.min.js',
    'resources/js/pages/dashboard.init.js',
    'resources/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js',
    'resources/libs/dropzone/dropzone-min.js',
    'resources/js/pages/project-create.init.js',
    'resources/js/pages/profile.init.js',
    'resources/js/app.js',
    'resources/js/PostAjax.js'
    ])
</head>
<body data-sidebar="dark">
<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <div class="navbar-brand-box">
                    <a href="/" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="/assets/images/logo.svg" alt="" height="22">
                            </span>
                        <span class="logo-lg">
                                <img src="/assets/images/logo-dark.png" alt="" height="17">
                            </span>
                    </a>
                    <a href="/" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="/assets/images/logo-light.svg" alt="" height="22">
                            </span>
                        <span class="logo-lg">
                                <img src="/assets/images/logo-light.png" alt="" height="19">
                            </span>
                    </a>
                </div>
                <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <form class="app-search d-none d-lg-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="অনুসন্ধান...">
                        <span class="bx bx-search-alt"></span>
                    </div>
                </form>
            </div>
            <div class="d-flex">
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown">
                        <img class="rounded-circle header-profile-user" src="/assets/images/users/avatar-1.jpg" alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1">ব্যবহারকারী</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item text-danger" href="#"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> লগআউট</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            <div id="sidebar-menu">
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">মেনু</li>
                    <li>
                        <a href="/" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span>ড্যাশবোর্ড</span>
                        </a>
                    </li>
                    <li>
                        <a href="/posts" class="waves-effect">
                            <i class="bx bx-file"></i>
                            <span>পোস্ট ম্যানেজমেন্ট</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Skote.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            ডিজাইন ও ডেভেলপ করেছে Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>
</html>
