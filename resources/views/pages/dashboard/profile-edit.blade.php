<x-app-layout>

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    @extends('layouts.header')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            @include('pages.partials.profile.edit.title')
        </div>
    </div>
    <!-- end page title -->
    <form id="profile-edit-form" autocomplete="off" class="needs-validation" novalidate enctype="multipart/form-data">

        <div class="row">
            <div class="col-lg-8">
                @include('pages.partials.profile.edit.edit-project')
                <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-lg-4">
                @include('pages.partials.profile.edit.project-settings')
            </div>
            <!-- end col -->
            <div class="col-lg-8">
                <div class="text-end mb-4">
                    <button type="submit" class="btn btn-primary">Update Info</button>
                </div>
            </div>
        </div>
        <!-- end row -->
    </form>


    <!-- Right Sidebar -->
@extends('layouts.settings')
<!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
</x-app-layout>



