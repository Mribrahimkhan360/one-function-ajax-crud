<x-app-layout>

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
@extends('layouts.header')

<!-- start page title -->
@include('pages.partials.profile.title')
<!-- end page title -->

    <div class="row">
        <div class="col-xl-4">
            <!-- start profile card -->
                @include('pages.partials.profile.welcome')
            <!-- end card -->

                @include('pages.partials.profile.information')
            <!-- end card -->

                @include('pages.partials.profile.experience')
            <!-- end card -->
        </div>

        <div class="col-xl-8">

            @include('pages.partials.profile.sales')

            @include('pages.partials.profile.revenue')

            @include('pages.partials.profile.projects')
        </div>
    </div>
    <!-- end row -->


    <!-- Right Sidebar -->
@extends('layouts.settings')
<!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
</x-app-layout>



