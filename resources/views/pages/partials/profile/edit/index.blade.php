<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Create New</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Project</a></li>
                    <li class="breadcrumb-item active">Create New</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<form id="create-post-form" autocomplete="off" class="needs-validation" novalidate enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">
                    <input type="hidden" class="form-control" id="post-id-input">
                    <div class="mb-3">
                        <label for="title-input" class="form-label">Name</label>
                        <input id="title-input" name="name" type="text" class="form-control" placeholder="Enter New Name..." required>
                        <div class="invalid-feedback">>Please enter a project name.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Project Image</label>
                        <div class="text-center">
                            <div class="position-relative d-inline-block">
                                <div class="position-absolute bottom-0 end-0">
                                    <label for="post-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer shadow font-size-16">
                                                <i class='bx bxs-image-alt'></i>
                                            </div>
                                        </div>
                                    </label>
                                    <input class="form-control d-none" id="post-image-input" type="file" accept="image/png,image/gif,image/jpeg">
                                </div>
                                <div class="avatar-lg">
                                    <div class="avatar-title bg-light rounded-circle">
                                        <img src="{{asset('/')}}admin/assets/images/users/avatar-1.jpg" id="postlogo-img" class="avatar-md rounded-circle" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="content-input" class="form-label">Please enter a project description.</label>
                        <textarea class="form-control" id="content-input" rows="4" placeholder="Enter project description..." required></textarea>
                        <div class="invalid-feedback">Please enter a project description.</div>
                    </div>
                    <div>
                        <label class="form-label">Assigned To</label>
                        <div class="fallback dropzone" id="create-dropzone" enctype="multipart/form-data">
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                </div>
                                <h4>Drop files here or click to upload.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Publish</h5>
                    <div class="mb-3">
                        <label class="form-label" for="post-status-input">Status</label>
                        <select class="form-select" id="post-status-input">
                            <option value="Published">Publish</option>
                            <option value="Draft" selected>Draft</option>
                            <option value="Archived">Archive</option>
                        </select>
                        <div class="invalid-feedback">Please Select Your Status</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="text-end mb-4">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </div>
    </div>
</form>

<form id="edit-post-form" autocomplete="off" class="needs-validation" novalidate enctype="multipart/form-data" style="display: none;">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" class="form-control" id="edit-post-id">
                    <div class="mb-3">
                        <label for="edit-title-input" class="form-label">পোস্টের শিরোনাম</label>
                        <input id="edit-title-input" name="edit-title-input" type="text" class="form-control" placeholder="পোস্টের শিরোনাম লিখুন..." required>
                        <div class="invalid-feedback">অনুগ্রহ করে শিরোনাম লিখুন।</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">পোস্টের ইমেজ</label>
                        <div class="text-center">
                            <div class="position-relative d-inline-block">
                                <div class="position-absolute bottom-0 end-0">
                                    <label for="edit-post-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="ইমেজ নির্বাচন">
                                        <div class="avatar-xs">
                                            <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer shadow font-size-16">
                                                <i class='bx bxs-image-alt'></i>
                                            </div>
                                        </div>
                                    </label>
                                    <input class="form-control d-none" id="edit-post-image-input" type="file" accept="image/png,image/gif,image/jpeg">
                                </div>
                                <div class="avatar-lg">
                                    <div class="avatar-title bg-light rounded-circle">
                                        <img src="/assets/images/users/avatar-1.jpg" id="edit-postlogo-img" class="avatar-md rounded-circle" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit-content-input" class="form-label">পোস্টের বিষয়বস্তু</label>
                        <textarea class="form-control" id="edit-content-input" rows="4" placeholder="পোস্টের বিষয়বস্তু লিখুন..." required></textarea>
                        <div class="invalid-feedback">অনুগ্রহ করে বিষয়বস্তু লিখুন।</div>
                    </div>
                    <div>
                        <label class="form-label">অতিরিক্ত ফাইল</label>
                        <div class="fallback dropzone" id="edit-dropzone" enctype="multipart/form-data">
                            <div class="dz-message needsclick">
                                <div class="mb-3">
                                    <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                </div>
                                <h4>ফাইল এখানে ড্রপ করুন বা ক্লিক করে আপলোড করুন।</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">প্রকাশ</h5>
                    <div class="mb-3">
                        <label class="form-label" for="edit-post-status-input">স্ট্যাটাস</label>
                        <select class="form-select" id="edit-post-status-input">
                            <option value="Published">প্রকাশিত</option>
                            <option value="Draft" selected>ড্রাফট</option>
                            <option value="Archived">আর্কাইভড</option>
                        </select>
                        <div class="invalid-feedback">অনুগ্রহ করে স্ট্যাটাস নির্বাচন করুন।</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="text-end mb-4">
                <button type="submit" class="btn btn-primary">পোস্ট আপডেট</button>
            </div>
        </div>
    </div>
</form>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">পোস্ট লিস্ট</h4>
                <div id="posts-list" class="mb-3"></div>
            </div>
        </div>
    </div>
</div>
