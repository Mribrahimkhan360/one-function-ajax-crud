<x-app-layout>


    <!-- Begin page -->
@extends('layouts.header')

<!-- start page title -->
    <div class="row">
        <div class="col-12">
            @include('pages.partials.profile.edit.title')
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div id="iconContainer"></div>
        </div>
    </div>

    <form id="createMenuForm">
    <!-- Icon Select -->
    <div class="mb-3 row">
        <label class="col-md-2 col-form-label">Icon</label>
        <div class="col-md-10">
            <select class="form-select" id="iconSelect">
                <option value="">Select Icon</option>
            </select>
            <div id="iconPreview" style="font-size:20px;margin-top:10px;"></div>
        </div>
    </div>

    <!-- Menu Title -->
    <div class="mb-3 row">
        <label for="menuTitle" class="col-md-2 col-form-label">Menu Title</label>
        <div class="col-md-10">
            <input class="form-control" type="text" id="menuTitle" placeholder="Enter Menu Title">
        </div>
    </div>

    <!-- Parent Menu -->
    <div class="mb-3 row">
        <label class="col-md-2 col-form-label">Parent Menu</label>
        <div class="col-md-10">
            <select id="menuList" class="form-select mt-3">
                <option value="">No Parent</option>
            </select>
        </div>
    </div>

    <!-- Route -->
    <div class="mb-3 row">
        <label class="col-md-2 col-form-label">Route</label>
        <div class="col-md-10">
            <input type="text" class="form-control" id="routeInput" placeholder="Enter URL">
        </div>
    </div>

    <!-- Type -->
    <div class="mb-3 row">
        <label class="col-md-2 col-form-label">Type</label>
        <div class="col-md-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="typeRadio" value="Dropdown" checked>
                <label class="form-check-label">Dropdown</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="typeRadio" value="Single">
                <label class="form-check-label">Single</label>
            </div>
        </div>
    </div>

    <!-- Status -->
    <div class="mb-3 row">
        <label class="col-md-2 col-form-label">Status</label>
        <div class="col-md-10">
            <input type="checkbox" id="statusCheck" checked>
        </div>
    </div>

    <div class="mb-3 row">
        <div class="col-md-10 offset-md-2">
            <button type="submit" class="btn btn-primary">Create Menu</button>
        </div>
    </div>
    </form>


    <!-- Right Sidebar -->
@extends('layouts.settings')
<!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
</x-app-layout>



