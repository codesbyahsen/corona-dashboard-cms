// Sweet alert for deletion purpose
function confirmToDelete(url) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-outline-danger ml-2'
        },
        buttonsStyling: false
    }).then(function (e) {
        if (e.value === true) {
            $.ajaxSetup({
                headers: {
                    'Accepts': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="X-CSRF-TOKEN"]').attr('content')
                }
              });
            $.ajax({
                type: 'DELETE',
                url: url,
                dataType: 'JSON',
                contentType: "application/json",
                success: function (result) {
                    if (result.success === true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: result.message,
                            customClass: { confirmButton: 'btn btn-success' }
                        }).then(function () { location.reload(); });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...!',
                            text: result.message,
                            customClass: { confirmButton: 'btn btn-success' }
                        }).then(function () { location.reload(); });
                    }
                }
            });
        }
    });
}

