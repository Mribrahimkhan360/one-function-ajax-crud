<x-app-layout>

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
@extends('layouts.header')

    {{--cover--}}
    <div class="row">
        <div class="col-lg-12">
            @include('pages.partials.profile.details.cover')
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            @include('pages.partials.profile.details.personal-details')
        </div><!--end col-->
        <div class="col-lg-9">
            @include('pages.partials.profile.details.about')
            @include('pages.partials.profile.details.project')
            @include('pages.partials.profile.details.social')
        </div><!--end col-->
    </div><!--end row-->

    <!-- Right Sidebar -->
@extends('layouts.settings')
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
</x-app-layout>



