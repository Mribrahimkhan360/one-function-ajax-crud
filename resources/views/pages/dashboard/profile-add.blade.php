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
    <form id="profile-add-form" autocomplete="off" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-8">
            @include('pages.partials.profile.add.edit-project')
            <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-lg-4">
            {{--  @include('pages.partials.profile.add.project-settings') --}}
            </div>
            <!-- end col -->
            <div class="col-lg-8">
                <div class="text-end mb-4">
                    <!-- Submit button -->
                    <button type="submit" id="btnSubmit" class="btn btn-primary w-100">Submit</button>
                </div>
            </div>
            <!-- Output message -->
            <div id="output" class="mt-3"></div>
        </div>
        <!-- end row -->
    </form>

    <div id="profile-list">
        <img src="waveLoader.svg" alt="">
    </div>


    <!-- Right Sidebar -->
@extends('layouts.settings')
<!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
</x-app-layout>



