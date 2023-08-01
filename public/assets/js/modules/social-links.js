/**
 | ----------------------------------------------------------------
 |  Show errors
 | ----------------------------------------------------------------
 |
 | It accepts the object parameter and shows the input
 | field errors
 |
 */
 const showErrors = (response) => {
    $('.error-name').html(response.message.name ?? '');
    $('.error-link').html(response.message.link ?? '');
}


/**
 | ----------------------------------------------------------------
 |  Reset Errors
 | ----------------------------------------------------------------
 |
 | It resets the input field errors of social link form
 |
 */

const resetErrors = () => {
    $('.error-name').html(null);
    $('.error-link').html(null);
}


/**
 | ----------------------------------------------------------------
 |  Reset Fields
 | ----------------------------------------------------------------
 |
 | It resets the input fields of social link form
 |
 */

const resetFields = () => {
    $('#createSocialLink .field-name').val(null).select2();
    $('#createSocialLink .field-link').val(null);
}


/**
 | ----------------------------------------------------------------
 |  Cancel Create Form
 | ----------------------------------------------------------------
 |
 | Remove errors and empty the fields
 |
 */

$('.cancel-create-form').click(function () {
    resetFields();
    resetErrors();
});


/**
 | ----------------------------------------------------------------
 |  Cancel Edit Form
 | ----------------------------------------------------------------
 |
 | Remove errors
 |
 */

 $('.cancel-edit-form').click(function () {
    resetErrors();
});


/**
 | ----------------------------------------------------------------
 |  Create
 | ----------------------------------------------------------------
 |
 | Send ajax request to store social link
 |
 */
 $('#createSocialLink form').submit(function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'Accepts': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="CSRF-TOKEN"]').attr('content')
        }
    });

    $.ajax({
        type: $(this).data('method'),
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function (result) {
            if (result.success === true) {
                $('#createSocialLink').modal('hide');
                resetFields();
                resetErrors();
                notify(result.message);

                // refresh the list of social links
                LaravelDataTables["sociallink-table"].ajax.reload();
            }
        },
        error: function (result) {
            showErrors(result.responseJSON);
        }
    });
});


/**
 | ----------------------------------------------------------------
 |  Update Status
 | ----------------------------------------------------------------
 |
 | Send ajax request to update social link status
 |
 */

$('#sociallink-table').on('submit', '.change-status', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajaxSetup({
                headers: {
                    'Accepts': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="CSRF-TOKEN"]').attr('content')
                }
            });

            $.ajax({
                type: 'PATCH',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (result) {
                    if (result.success === true) {
                        LaravelDataTables["sociallink-table"].ajax.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...!',
                            text: result.message,
                        })
                    }
                },
                error: function (result) {
                    Swal.fire({
                        icon: 'error',
                        title: result.status,
                        text: result.responseJSON.message,
                    })
                }
            });
        }
    })
});


/**
 | ----------------------------------------------------------------
 |  Destroy
 | ----------------------------------------------------------------
 |
 | Send ajax request to delete Social Link
 |
 */

$('#sociallink-table').on('click', '.destroy', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajaxSetup({
                headers: {
                    'Accepts': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="CSRF-TOKEN"]').attr('content')
                }
            });

            $.ajax({
                type: 'DELETE',
                url: $(this).data('url'),
                success: function (result) {
                    if (result.success === true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: result.message
                        })
                        LaravelDataTables["sociallink-table"].ajax.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...!',
                            text: result.message,
                        })
                    }
                },
                error: function (result) {
                    Swal.fire({
                        icon: 'error',
                        title: result.status,
                        text: result.responseJSON.message,
                    })
                }
            });
        }
    })
});

