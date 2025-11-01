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
        @csrf
        <div class="row">
            <div class="col-lg-8">
            @include('pages.partials.profile.add.edit-project')
            <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-lg-4">
                @include('pages.partials.profile.add.project-settings')
            </div>
            <!-- end col -->
            <div class="col-lg-8">
                <div class="text-end mb-4">
                    <input type="submit" class="btn btn-primary" value="Update Info"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Mail</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="userTable"></tbody>
                </table>
            </div>
        </div>



        <!-- end row -->
    </form>
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form id="edit-form" class="modal-content" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="edit_id" name="id">

                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Name</label>
                        <input type="text" id="edit_name" name="name" class="form-control">
                        <div class="invalid-feedback" id="error-name"></div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_description" class="form-label">Description</label>
                        <textarea id="edit_description" name="description" class="form-control" rows="3"></textarea>
                        <div class="invalid-feedback" id="error-description"></div>
                    </div>

                    <div class="mb-3">
                        <label for="edit_image" class="form-label">Image (optional)</label>
                        <input type="file" id="edit_image" name="image" class="form-control">
                        <div class="invalid-feedback" id="error-image"></div>
                        <small class="text-muted">If you upload a new image the old one will be removed.</small>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="btnUpdate" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>



    <!-- Right Sidebar -->
@extends('layouts.settings')
<!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
</x-app-layout>



