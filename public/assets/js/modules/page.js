
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
    $('.error-title').html(response.message.name ?? '');
    $('.error-description').html(response.message.link ?? '');
}



/**
 | ----------------------------------------------------------------
 |  Reset Errors
 | ----------------------------------------------------------------
 |
 | It resets the input field errors of page form
 |
 */

const resetErrors = () => {
    $('.error-title').html(null);
    $('.error-description').html(null);
}



/**
 | ----------------------------------------------------------------
 |  Show Fields
 | ----------------------------------------------------------------
 |
 | It accepts the parameter and show the input fields of
 | page
 |
 */

const showFields = (response) => {
    $('#editSocialLink .field-title').val(response?.data?.name.toLowerCase()).trigger('change');
    $('#editSocialLink .field-description').val(response?.data?.link);
}



/**
 | ----------------------------------------------------------------
 |  Reset Fields
 | ----------------------------------------------------------------
 |
 | It resets the input fields of page form
 |
 */

const resetFields = () => {
    $('#createSocialLink .field-title').val(null).select2();
    $('#createSocialLink .field-description').val(null);
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
 | Send ajax request to store page
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
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function (result) {
            if (result.success === true) {
                $('#createSocialLink').modal('hide');
                resetErrors();
                resetFields();
                notify('Created');

                // refresh the list of pages
                LaravelDataTables["page-table"].ajax.reload();
            }
        },
        error: function (result) {
            showErrors(result.responseJSON);
        }
    });
});



/**
 | ----------------------------------------------------------------
 |  Edit
 | ----------------------------------------------------------------
 |
 | It sends ajax request and get specific page data
 | against id
 |
 */

$('#page-table').on('click', '.edit', function () {
    // get update url
    $('#editSocialLink form').attr('action', $(this).data('update-url'));
    $.ajax({
        type: 'GET',
        url: $(this).data('url'),
        success: function (result) {
            if (result.success === true) {
                $('#editSocialLink').modal('show');
                showFields(result);
            }
        },
        error: function (result) {
            $('.alert').addClass('show');
            $('.error ').html(result?.responseJSON?.message);
        }
    });
});



/**
 | ----------------------------------------------------------------
 |  Update
 | ----------------------------------------------------------------
 |
 | It sends ajax request with put method and update specific
 | page data against id
 |
 */

$('#editSocialLink form').submit(function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'Accepts': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="CSRF-TOKEN"]').attr('content')
        }
    });

    $.ajax({
        type: 'PUT',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function (result) {
            if (result.success === true) {
                $('#editSocialLink').modal('hide');
                resetErrors();
                notify('Saved');

                // refresh the list of pages
                LaravelDataTables["page-table"].ajax.reload();
            }
        },
        error: function (result) {
            if (result?.status === 422) {
                showErrors(result.responseJSON);
            } else {
                $('#editSocialLink').modal('hide');
                $('.alert').addClass('show');
                $('.error ').html(result?.responseJSON?.message);
            }
        }
    });
});



/**
 | ----------------------------------------------------------------
 |  Update Status
 | ----------------------------------------------------------------
 |
 | Send ajax request to update page status
 |
 */

$('#page-table').on('submit', '.change-status', function (e) {
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
                        // refresh the list of pages
                        LaravelDataTables["page-table"].ajax.reload();
                    }
                },
                error: function (result) {
                    $('.alert').addClass('show');
                    $('.error ').html(result?.responseJSON?.message);
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
 | Send ajax request to delete page
 |
 */

$('#page-table').on('click', '.destroy', function (e) {
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
                        // refresh the list of pages
                        LaravelDataTables["page-table"].ajax.reload();
                    }
                },
                error: function (result) {
                    $('.alert').addClass('show');
                    $('.error ').html(result?.responseJSON?.message);
                }
            });
        }
    })
});

