<x-app-layout>

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
{{--@extends('layouts.header')--}}
@extends('layouts.header')

<!-- END layout-wrapper -->

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            @include('pages.partials.dashboard.title')
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4">
                        @include('pages.partials.dashboard.welcome')
                        @include('pages.partials.dashboard.earning')
                    </div>
                    <div class="col-xl-8">
                        @include('pages.partials.dashboard.sales')
                        @include('pages.partials.dashboard.email')
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-4">
                        @include('pages.partials.dashboard.social')
                    </div>
                    <div class="col-xl-4">
                        @include('pages.partials.dashboard.activity')
                    </div>

                    <div class="col-xl-4">
                        @include('pages.partials.dashboard.selling')
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        @include('pages.partials.dashboard.table')
                    </div>
                </div>
                <!-- end row -->
            <!-- container-fluid -->


    <!-- Right Sidebar -->
@extends('layouts.settings')
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>
</x-app-layout>
