{{--<div class="card">--}}
{{--    <div class="card-body">--}}
{{--        <input type="hidden" class="form-control" id="formAction" name="formAction" value="add">--}}
{{--        <input type="hidden" class="form-control" id="project-id-input">--}}
{{--        <div class="mb-3">--}}
{{--            <label for="projectname-input" class="form-label">Enter New name</label>--}}
{{--            <input id="projectname-input" name="projectname-input" type="text" class="form-control" placeholder="Enter project name..." required>--}}
{{--            <div class="invalid-feedback">Enter New name.</div>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <label class="form-label">Profile Image</label>--}}

{{--            <div class="text-center">--}}
{{--                <div class="position-relative d-inline-block">--}}
{{--                    <div class="position-absolute bottom-0 end-0">--}}
{{--                        <label for="project-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">--}}
{{--                            <div class="avatar-xs">--}}
{{--                                <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer shadow font-size-16">--}}
{{--                                    <i class='bx bxs-image-alt'></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </label>--}}
{{--                        <input class="form-control d-none" value="" id="project-image-input" type="file" accept="image/png, image/gif, image/jpeg">--}}
{{--                    </div>--}}
{{--                    <div class="avatar-lg">--}}
{{--                        <div class="avatar-title bg-light rounded-circle">--}}
{{--                            <img src="{{asset('/')}}admin/assets/images/users/avatar-1.jpg" id="projectlogo-img" class="avatar-md h-auto rounded-circle" />--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <label for="projectdesc-input" class="form-label">Project Description</label>--}}
{{--            <textarea class="form-control" id="projectdesc-input" rows="3" placeholder="Enter project description..." required></textarea>--}}
{{--            <div class="invalid-feedback">Please enter a project description.</div>--}}
{{--        </div>--}}
{{--        <div class="mb-3 position-relative">--}}
{{--            <label for="task-assign-input" class="form-label">Assigned To</label>--}}

{{--            <div class="avatar-group justify-content-center" id="assignee-member"></div>--}}

{{--            <div class="select-element" id="select-element">--}}
{{--                <button class="btn btn-light w-100 d-flex justify-content-between" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">--}}
{{--                    <span>Assigned To<b id="total-assignee" class="mx-1">0</b>Members</span> <i class="mdi mdi-chevron-down"></i>--}}
{{--                </button>--}}
{{--                <div class="dropdown-menu w-100">--}}
{{--                    <div data-simplebar style="max-height: 172px">--}}
{{--                        <ul class="list-unstyled mb-0 assignto-list">--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="avatar-xs flex-shrink-0 me-2">--}}
{{--                                        <img src="{{asset('/')}}admin/assets/images/users/avatar-2.jpg" alt="" class="img-fluid rounded-circle" />--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-grow-1">Tommie Metzler</div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="avatar-xs flex-shrink-0 me-2">--}}
{{--                                        <img src="{{asset('/')}}admin/assets/images/users/avatar-3.jpg" alt="" class="img-fluid rounded-circle" />--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-grow-1">Paul Barone</div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="avatar-xs flex-shrink-0 me-2">--}}
{{--                                        <img src="{{asset('/')}}admin/assets/images/users/avatar-4.jpg" alt="" class="img-fluid rounded-circle" />--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-grow-1">Chris Lucas</div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="avatar-xs flex-shrink-0 me-2">--}}
{{--                                        <img src="{{asset('/')}}admin/assets/images/users/avatar-1.jpg" alt="" class="img-fluid rounded-circle" />--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-grow-1">Shirley North</div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="avatar-xs flex-shrink-0 me-2">--}}
{{--                                        <img src="{{asset('/')}}admin/assets/images/users/avatar-5.jpg" alt="" class="img-fluid rounded-circle" />--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-grow-1">Patricia Pierce</div>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="avatar-xs flex-shrink-0 me-2">--}}
{{--                                        <img src="{{asset('/')}}admin/assets/images/users/avatar-6.jpg" alt="" class="img-fluid rounded-circle" />--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-grow-1">William Max</div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="avatar-xs flex-shrink-0 me-2">--}}
{{--                                        <img src="{{asset('/')}}admin/assets/images/users/avatar-7.jpg" alt="" class="img-fluid rounded-circle" />--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-grow-1">Johnnie Walton</div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                    <div class="avatar-xs flex-shrink-0 me-2">--}}
{{--                                        <img src="{{asset('/')}}admin/assets/images/users/avatar-8.jpg" alt="" class="img-fluid rounded-circle" />--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-grow-1">Miriam Crum</div>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <label class="form-label">Attached Files</label>--}}
{{--            <div class="fallback dropzone" id="myId" enctype="multipart/form-data">--}}
{{--                <div class="fallback">--}}
{{--                    <input name="file" type="file" multiple />--}}
{{--                </div>--}}

{{--                <div class="dz-message needsclick">--}}
{{--                    <div class="mb-3">--}}
{{--                        <i class="display-4 text-muted bx bxs-cloud-upload"></i>--}}
{{--                    </div>--}}

{{--                    <h4>Drop files here or click to upload.</h4>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- end card body -->--}}
{{--</div>--}}

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Profile</h4>
                    <div id="responseMessage" class="mb-3"></div> <!-- Inline alerts -->
                    <form id="profileEditForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Profile Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <img id="imagePreview" src="" alt="Image Preview" class="mt-2" style="max-width: 200px; display: none;">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
