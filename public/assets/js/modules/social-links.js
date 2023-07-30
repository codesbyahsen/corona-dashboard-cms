/**
 | ----------------------------------------------------------------
 |  Reset Create Form
 | ----------------------------------------------------------------
 |
 | Reset the fields of create form
 |
 */

const resetCreateForm = () => {
    $('.field-name').val(null).select2();
    $('.field-link').val(null);
}


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
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajaxSetup({
                headers: {
                    'Accepts': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="X-CSRF-TOKEN"]').attr('content')
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
                    'X-CSRF-TOKEN': $('meta[name="X-CSRF-TOKEN"]').attr('content')
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

