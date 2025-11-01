<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-3">Publish</h5>

        <div class="mb-3">
            <label class="form-label" for="project-status-input">Status</label>
            <select class="form-select" id="project-status-input">
                <option value="Completed">Completed</option>
                <option value="Inprogress" selected>Inprogress</option>
                <option value="Delay">Delay</option>
            </select>
            <div class="invalid-feedback">Please select project status.</div>
        </div>

        <div>
            <label class="form-label" for="project-visibility-input">Visibility</label>
            <select class="form-select" id="project-visibility-input">
                <option value="Private">Private</option>
                <option value="Public">Public</option>
                <option value="Team">Team</option>
            </select>
        </div>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->

<div class="card">
    <div class="card-body">
        <h5 class="card-title mb-3">Due Date</h5>

        <input type="text" id="duedate-input" class="form-control" placeholder="Select due date" name="due date" data-date-format="dd M, yyyy" data-provide="datepicker" data-date-autoclose="true" required />
        <div class="invalid-feedback">Please select due date.</div>
    </div>
    <!-- end card body -->
</div>
<!-- end card -->
