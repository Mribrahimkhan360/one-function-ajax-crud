$(document).ready(function () {
    const form = $("#profile-add-form");
    const submitBtn = $("#btnSubmit");
    const output = $("#output");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    form.on("submit", function (event) {
        // alert('Hello');
        event.preventDefault();

        // Clear previous messages
        output.text("").removeClass("text-success text-danger");

        // Disable button while processing
        submitBtn.prop("disabled", true).text("Submitting...");

        const formData = new FormData(this);
        // const url = "http://127.0.0.1:8000/profile/save";
        $.ajax({
            type: "POST",
            url: profileStoreUrl,
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                if (data.res) {
                    output.text(data.res).addClass("text-success");
                    $("input[type='text']").val('');
                    $("textarea[type='text']").val('');
                    $("input[type='file']").val('');
                    fetchProfiles();

                    // $('#profile-add-form')[0].reset();

                } else {
                    output.text("Unknown success response").addClass("text-warning");
                }
            },
            error: function (xhr) {
                // let message = "An error occurred. Please try again.";
                let message = xhr.responseText;

                // Display server or unexpected errors
                output.text(message).addClass("text-danger");
                console.error("Error details:", xhr.responseText);
            },
            complete: function () {
                // Re-enable the button after request completes
                submitBtn.prop("disabled", false).text("submit");
            },
        });
    });


    // Fetch Data
    function fetchProfiles() {
        $.ajax({
            url: profileFetchUrl, // Will pass from Blade down.
            type: "GET",
            success: function (data) {
                let html = '';
                if (data.length > 0) {
                    html = `
                            <table border="1" width="100%" cellspacing="0" cellpadding="5" style="border:1px solid #dddddd">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                            <tbody>
                           `;
                    data.forEach((profile, index) => {
                        const imageUrl = profile.image ? `/${profile.image}` : '/images/default.png';
                        // const imageUrl = profile.image ? `/${profile.image}` : '/images/default.png';
                        html += `
                            <tr>
                                <td>${index + 1}</td>
                                <td><img src="${imageUrl}" alt="${profile.name}" width="80" class="rounded"></td>
                                <td>${profile.name}</td>
                                <td>${profile.description}</td>
                                <td class="d-flex">
                                    <button class="btn btn-danger btn-sm edit-button"  data-id="${profile.id}">Edit</button>
                                    <button class="btn btn-danger btn-sm delete-btn" data-id="${profile.id}">Delete</button>
                                </td>
                            </tr>
                        `;
                    });
                    html += `
                        </tbody>
                        </table>
                    `;
                }else{
                    html = "<p>No profile found.</p>";
                }
                $("#profile-list").html(html);
            },
            error: function (xhr) {
                console.error("Fetch error:", xhr.responseText);
                $("#profile-list").html("<p style='color:red;'>Failed to load profiles.</p>");
            }
        });
    }
    fetchProfiles();


    // Delete function
    $(document).on('click', '.delete-btn', function () {
        const id = $(this).data('id'); // Getting id from data-id
        if (confirm('Are you sure you want to delete this profile?')) {
            const deleteUrl = profileDestroyUrl.replace(':id', id); // Here :id is being replaced
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                success: function (response) {
                    alert(response.res);
                    fetchProfiles(); // Refresh the table.
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    });



    // When "Edit" button clicked — fetch data
    $('body').on('click', '.edit-btn', function(event) {
        event.preventDefault();
        const id = $(this).data('id');
        const url = profileEditUrl.replace(':id', id);

        $('#edit-error').hide().find('ul').empty();

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $('#editPage').find('#name').val(response.data.name);
                    $('#editPage').find('#description').val(response.data.description);
                    $('#editPage').find('#profileImage').attr('src', response.data.image || '');
                    $('#editPage').attr('action', response.url);
                    $('#edit-Page').modal('show');
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
                alert('Failed to fetch data.');
            }
        });
    });

    // Handle image preview before upload
    $('#image').on('change', function() {
        const file = this.files[0];
        if (file) {
            $('#profileImage').attr('src', URL.createObjectURL(file));
        }
    });
    // When form submitted — perform AJAX update
    $('#editPage').on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const actionUrl = $(this).attr('action');

        $.ajax({
            url: actionUrl,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status) {
                    alert(response.message);
                    $('#edit-Page').modal('hide');
                    fetchProfiles(); // Reload table/list
                } else {
                    alert('Update failed.');
                }
            },
            error: function(xhr) {
                const errors = xhr.responseJSON?.errors;
                $('#edit-error').show().find('ul').empty();
                $.each(errors, function(key, value) {
                    $('#edit-error ul').append('<li>' + value + '</li>');
                });
            }
        });
    });



});
