$(document).ready(function () {


    // ====================================================
    //   1. CSRF TOKEN SETUP - Project all AJAX request
    // ====================================================

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // ====================================================
    //   2. DOM ELEMENTS - Variable declare
    // ====================================================


    // ====================================================
    //   3. FETCH - Data form database & create, edit,
    //   delete, update here
    // ====================================================

    function tableFetch(action = 'fetch', data = {}, url = '') {

        let method = 'GET';
        let postData = null;

        switch (action) {
            case 'fetch':
                method = 'GET';
                break;
            case 'create':
                method = 'POST';
                postData = data;
                break;
            case 'update':
                method = 'PUT';
                postData = data;
                break;
            case 'delete':
                method = 'DELETE';
                break;
            case 'edit':
                method = 'GET';
                break;
            default:
                method = 'GET';
                break;
        }
        // ===========================
        //   AJAX REQUEST
        // ===========================
        $.ajax({
            url: url,
            method: method,
            data: postData,
            dataType: 'json',
            success: function (res) {
                if (action === 'fetch') {
                    const tableInfo = $("#table-info");
                    tableInfo.empty(); // clear old rows

                    res.forEach((m, index) => {
                        tableInfo.append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${m.name}</td>
                                <td>${m.phone}</td>
                                <td>${m.email}</td>
                                <td>${m.address}</td>
                                <td>${m.range}</td>
                                <td>${m.status}</td>
                                <td>${m.login_count}</td>
                                <td>
                                    <button class="btn btn-sm btn-danger m-edit-btn" data-id="${m.id}" data-route="/merchant/edit/${m.id}"> Edit </button>
                                    <button class="btn btn-sm btn-danger m-delete-btn" data-id="${m.id}" data-route="/merchant/delete/${m.id}"> Delete </button>
                                </td>
                            </tr>
                        `);
                    });

                    deleteItem();
                    editItem();
                    addItem();

                } else if (action === 'delete') {

                    alert('Deleted successfully!');
                    tableFetch('fetch', {}, '/merchant/fetch');

                } else if (action === 'edit') {
                    // Fill modal fields
                    $('#edit_merchant_id').val(res.id);
                    $('#edit_name').val(res.name);
                    $('#edit_phone').val(res.phone);
                    $('#edit_email').val(res.email);
                    $('#edit_address').val(res.address);
                    $('#edit_range').val(res.range);
                    $('#edit_status').val(res.status);

                    // Show modal
                    $('#editMerchantModal').modal('show');

                } else if (action === 'create'){
                    alert('Merchant added successfully!');
                    $('#addMerchantModal').modal('hide');
                    $('#addMerchantForm')[0].reset();
                    tableFetch('fetch', {}, '/merchant/fetch');
                }
                else if (action === 'update'){
                    alert('Merchant updated successfully!');
                    $('#editMerchantModal').modal('hide');
                    tableFetch('fetch', {}, '/merchant/fetch');
                }
            },
            error: function (err){
                console.log(err);
                alert('Something went wrong!');
            }
        });
    }

    // ====================================================
    // 4. ADD FUNCTION
    // ====================================================
    function addItem() {
        $(".m-add-btn").click(function (e) {
            e.preventDefault();
            const route = $(this).data('route');
            if (confirm('Are you sure you want to Add this item?')) {
                tableFetch('create', {}, route);
            }
        });
    }
    // ====================================================
    // 5. FETCH FUNCTION
    // ====================================================
    tableFetch('fetch', {}, '/merchant/fetch');

    // ====================================================
    // 6. DELETE FUNCTION
    // ====================================================
    function deleteItem() {
        $(".m-delete-btn").click(function () {
            const route = $(this).data('route');
            if (confirm('Are you sure you want to delete this item?')) {
                tableFetch('delete', {}, route);
            }
        });
    }

    // ====================================================
    // 7. EDIT FUNCTION
    // ====================================================
    function editItem() {
        $(".m-edit-btn").click(function () {
            const route = $(this).data('route'); // /merchant/edit/5
            tableFetch('edit', {}, route);
        });
    }

    // ====================================================
    // 8. EDIT FUNCTION MODEL
    // ====================================================
    function modelEdit() {
        $('#editMerchantForm').on('submit', function (e) {
            e.preventDefault();
            const id = $('#edit_merchant_id').val();
            const formData = $(this).serialize(); // name=Ibrahim&email=ibrahim%40example.com&phone=01700000000
            tableFetch('update', formData, `/merchant/update/${id}`);
        });
    }
    modelEdit();




    // ====================================================
    // 9. ADD MERCHANT FORM SUBMIT
    // ====================================================
    function modelAdd() {
        $('#addMerchantForm').on('submit', function (e) {
            e.preventDefault();
            const id = $('#add_merchant_id').val();
            const formData = $(this).serialize();
            tableFetch('create', formData, '/merchant/create');
        });
    }
    modelAdd();
});
