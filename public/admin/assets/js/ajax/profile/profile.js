$('#profileForm').on('submit', function(e){
    e.preventDefault();

    const formData = new FormData(this);

    $.ajax({
        url: "{{ route('profile.update') }}",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response){
            if(response.success){
                $('#responseMessage').html('<div class="alert alert-success">'+response.message+'</div>');
            }
        },
        error: function(xhr){
            $('#responseMessage').html('<div class="alert alert-danger">Error updating profile!</div>');
        }
    });
});
