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

    <div class="row">
        <div class="col-md-3">
            <form id="create-menu">
                @csrf
                @include('pages.partials.menu.formCategory')
                <button type="submit" class="btn btn-primary w-md" id="btnSubmit">Create Category</button>
            </form>
        </div>
        <div class="col-md-3">
            <form id="create-menu-sub">
                @csrf
                @include('pages.partials.menu.formSubCategory')
                <button type="submit" class="btn btn-primary w-md" id="btnSubCategory">Create Sub Category</button>
            </form>
        </div>
        <div class="col-md-3">
            <div id="menu-list">
                <img src="waveLoader.svg" alt="">
            </div>
        </div>
        <div class="col-md-3">
            <div id="sub-category-list">
                <img src="waveLoader.svg" alt="">
            </div>
        </div>
    </div>




    <!-- Right Sidebar -->
@extends('layouts.settings')
<!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
</x-app-layout>



