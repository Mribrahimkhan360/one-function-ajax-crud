$(document).ready(function () {

    // ====================================================
    //   1. CSRF TOKEN SETUP - Project all AJAX request
    // ====================================================

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function tableTwoFetch(action = 'fetch', data = {}, url = '') {


        let method = 'GET';
        let postData = null;

        switch (action) {
            case 'fetch':
                method = 'GET';
                break;
        }
        $.ajax({
            url: url,
            method: method,
            data: postData,
            dataType: 'json',
            success: function (res) {
                if (action === 'fetch') {
                    const tableInfoTwo = $("#table-info-two");
                    tableInfoTwo.empty(); // clear old rows

                    res.forEach((m, index) => {
                        tableInfoTwo.append(`
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
                                    <button class="btn btn-sm btn-danger m-delete-btn" data-id="${m.id}" data-route="/merchant-two/delete/${m.id}"> Delete </button>
                                    <button class="btn btn-sm btn-danger m-edit-btn" data-id="${m.id}" data-route="/merchant-two/edit/${m.id}"> Edit </button>
                                </td>
                            </tr>
                        `);
                    });


                }


            }
        });
    }

    // ====================================================
    // 5. FETCH FUNCTION
    // ====================================================
    tableTwoFetch('fetch', {}, '/merchant-two/fetch');

    // ====================================================
    // 9. ADD MERCHANT FORM SUBMIT
    // ====================================================
    function addMerchant() {
        $('#addMerchantTwoModal').on('submit', function (e) {
            e.preventDefault();
            const id = $('#add_two_merchant_id').val();
            const formData = $(this).serialize();
            tableTwoFetch('create', formData, '/merchant-two/create');
        });
    }
    addMerchant();


});
