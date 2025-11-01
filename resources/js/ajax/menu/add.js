$(document).ready(function () {
    const form = $('#create-menu');
    const submitButton = $('#btnSubmit');
    const output = $("#munu-list"); // form এর output div

    const formSub = $('#create-menu-sub');
    const submitSubCatBtn = $('#btnSubCategory');
    const outputSubCat = $("#sub-category-list");


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    /*
    |--------------------------------------------------------------------------
    | MENUS CATEGORY SCRIPTS HERE
    |--------------------------------------------------------------------------
    |
    | All submenu related JavaScript functions, AJAX calls,
    | and DOM manipulations are defined below.
    | You can organize your event listeners or utility functions here.
    |
    */

    form.on("submit", function (event) {
        event.preventDefault();
        output.text("").removeClass("text-success text-danger");
        submitButton.prop("disabled", true).text("Submitting...");

        const formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: menuStoreUrl,
            data: formData,
            processData: false,
            contentType:false,
            success: function (data) {
                console.log(data);
                if (data.res)
                {
                    output.text(data.res).addClass("text-success");
                    $("input[type='text']").val('');

                    // fetch data
                    fetchMenus();
                }
                else{
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
                submitButton.prop("disabled", false).text("submit");
            }
        });
    });



    function fetchMenus() {
        $.ajax({
            url: menuFetchUrl, // Will pass from Blade down.
            type: "GET",
            success: function (data) {
                console.log(data.res);
                let html = '';
                if (data.length > 0) {
                    html = `
                            <table border="1" width="100%" cellspacing="0" cellpadding="5" style="border:1px solid #dddddd">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name (Category)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                           `;
                    data.forEach((menu, index) => {
                        html += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${menu.name}</td>
                                <td class="d-flex">
                                    <button class="btn btn-danger btn-sm edit-button"  data-id="${menu.id}">Edit</button>
                                    <button class="btn btn-danger btn-sm delete-button" data-id="${menu.id}">Delete</button>
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
                $("#menu-list").html(html);
            },
            error: function (xhr) {
                console.error("Fetch error:", xhr.responseText);
                $("#menu-list").html("<p style='color:red;'>Failed to load menu.</p>");
            }
        });
    }
    fetchMenus();


    // Delete function
    $(document).on('click', '.delete-button', function () {
        const id = $(this).data('id'); // Getting id from data-id
        if (confirm('Are you sure you want to delete this menu?')) {
            const deleteUrl = menuDestroyUrl.replace(':id', id); // Here :id is being replaced
            $.ajax({
                url: deleteUrl,
                type: 'DELETE',
                success: function (response) {
                    // alert(response.res);
                    fetchMenus(); // Refresh the table.
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    });

    // When "Edit" button clicked — fetch data
    $('body').on('click', '.edit-button', function(event) {
        event.preventDefault();
        const id = $(this).data('id');
        const url = menuEditUrl.replace(':id', id);

        $('#menu-error').hide().find('ul').empty();

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $('#menuPage').find('#name').val(response.data.name);
                    $('#menuPage').attr('action', response.url);
                    $('#menu-Page').modal('show');
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



    $('#menuPage').on('submit', function(e) {
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
                    $('#menu-Page').modal('hide');
                    fetchMenus(); // Reload table/list
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

    /*
    |--------------------------------------------------------------------------
    | MENUS SUB CATEGORY SCRIPTS HERE
    |--------------------------------------------------------------------------
    |
    | All submenu related JavaScript functions, AJAX calls,
    | and DOM manipulations are defined below.
    | You can organize your event listeners or utility functions here.
    |
    */

    $('#create-menu-sub').on("submit", function (event) {
        event.preventDefault();
        outputSubCat.text("").removeClass("text-success text-danger");
        submitSubCatBtn.prop("disabled", true).text("Submitting...");

        const formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: subCategoryStoreUrl,
            data: formData,
            processData: false,
            contentType:false,
            success: function (data) {
                console.log(data);
                if (data.res)
                {
                    output.text(data.res).addClass("text-success");
                    $("input[type='text']").val('');

                    // fetch data
                    fetchSubCategory();
                }
                else{
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
                submitButton.prop("disabled", false).text("submit");
            }
        });
    });



    function fetchSubCategory() {
        $.ajax({
            url: subCategoryFetchUrl, // Will pass from Blade down.
            type: "GET",
            success: function (dataSub) {
                let html = '';
                if (dataSub.length > 0) {
                    html = `
                            <table border="1" width="100%" cellspacing="0" cellpadding="5" style="border:1px solid #dddddd">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name (Sub Category)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                           `;
                    dataSub.forEach((subCategory, index) => {
                        html += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${subCategory.name}</td>
                                <td class="d-flex">
                                    <button class="btn btn-danger btn-sm edit-sub-button"  data-id="${subCategory.id}">Edit</button>
                                    <button class="btn btn-danger btn-sm delete-sub-button" data-id="${subCategory.id}">Delete</button>
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
                $("#sub-category-list").html(html);
            },
            error: function (xhr) {
                console.error("Fetch error:", xhr.responseText);
                $("#menu-list").html("<p style='color:red;'>Failed to load menu.</p>");
            }
        });
    }
    fetchSubCategory();


    // Delete function
    $(document).on('click', '.delete-sub-button', function () {
        const id = $(this).data('id'); // Getting id from data-id
        if (confirm('Are you sure you want to delete this Sub Category?')) {
            const deleteSubUrl = subCategoryDestroyUrl.replace(':id', id); // Here :id is being replaced
            $.ajax({
                url: deleteSubUrl,
                type: 'DELETE',
                success: function (response) {
                    // alert(response.res);
                    fetchSubCategory(); // Refresh the table.
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                }
            });
        }
    });

    // When "Edit" button clicked — fetch data
    $('body').on('click', '.edit-sub-button', function(event) {
        event.preventDefault();
        const id = $(this).data('id');
        const url = subCategoryEditUrl.replace(':id', id);

        $('#sub-category-page-error').hide().find('ul').empty();

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $('#subCategoryPage').find('#name').val(response.data.name);
                    $('#subCategoryPage').attr('action', response.url);

                    // fetch data
                    fetchSubCategory();

                    $('#sub-category-page').modal('show');
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



    $('#subCategoryPage').on('submit', function(e) {
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
                    $('#menu-Page').modal('hide');
                    fetchSubCategory(); // Reload table/list
                } else {
                    alert('Update failed.');
                }
            },
            error: function(xhr) {
                const errors = xhr.responseJSON?.errors;
                $('#sub-category-page-error').show().find('ul').empty();
                $.each(errors, function(key, value) {
                    $('#sub-category-page-error ul').append('<li>' + value + '</li>');
                });
            }
        });
    });

});
