<x-app-layout>
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->
    <!-- Begin page -->
    @extends('layouts.header')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-4 text-primary-deep">Merchant List</h3>
                    <form class="row gy-2 gx-3 align-items-center">
                        <div class="col-md-4">
                            <label class="form-label" for="autoSizingSelect">Merchant</label>
                            <select class="form-select" id="autoSizingSelect">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="from-date">From Date</label>
                            <div class="input-group" id="datepicker1">
                                <input type="text" class="form-control" placeholder="dd M, yyyy" id="to-date"
                                       data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker">

                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div><!-- input-group -->
                        </div>
                        <div class="col-md-2">
                            <label for="to-date">To Date</label>
                            <div class="input-group" id="datepicker1">
                                <input type="text" class="form-control" placeholder="dd M, yyyy" id="to-date"
                                       data-date-format="dd M, yyyy" data-date-container='#datepicker1' data-provide="datepicker">
                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div><!-- input-group -->
                        </div>
                        <div class="col-md-2">
                            <label for="" class="form-label invisible">Reset</label>
                            <a href="" class="btn btn-outline-danger w-100 d-flex items-center justify-content-center">
                                <i class="bx bx-reset font-2xl"></i>
                            </a>
                        </div>
                        <div class="col-md-2">
                            <label for="" class="form-label invisible">Add</label>
                            <a href="#" class="btn btn-outline-primary w-100 d-flex items-center justify-content-center"
                               data-bs-toggle="modal" data-bs-target="#addMerchantTwoModal">
                                <i class="bx bxs-add-to-queue font-2xl text-center"></i>
                            </a>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                        <tr>
                            <th>#SL</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Range</th>
                            <th>Status</th>
                            <th>Login Count</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="table-info-two">
                        </tbody>
                    </table>


                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <!-- Add Merchant Modal -->
    <div class="modal fade" id="addMerchantTwoModal" tabindex="-1" aria-labelledby="addMerchantLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="addMerchantLabel">Add Merchant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="addMerchantTwoForm" method="POST" action="">
                        @csrf
                        <input type="hidden" id="add_two_merchant_id" name="id">

                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" id="add_two_name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label>Phone</label>
                            <input type="text" class="form-control" id="add_two_phone" name="phone" required>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" id="add_two_email" name="email">
                        </div>

                        <div class="mb-3">
                            <label>Address</label>
                            <input type="text" class="form-control" id="add_two_address" name="address">
                        </div>
                        <div class="mb-3">
                            <label>Store Code</label>
                            <input type="text" class="form-control" id="add_two_store_code" name="store_code">
                        </div>

                        <div class="mb-3">
                            <label>Range</label>
                            <input type="text" class="form-control" id="add_two_range" name="range">
                        </div>
                        <div class="mb-3">
                            <label>Store Name</label>
                            <input type="text" name="store_name" id="add_two_store_name" class="form-control" placeholder="Enter Store Name" required>
                        </div>

                        <div class="mb-3">
                            <label>Status</label>
                            <select class="form-select" id="add_two_status" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success w-100" id="addMerchantTwoBtn">
                            Add Merchant
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Right Sidebar -->
@extends('layouts.settings')
<!-- /Right-bar -->
</x-app-layout>
