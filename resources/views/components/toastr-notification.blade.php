<script>
    $(function() {
        @if (Session::has('success'))
            toastr['success']("", "{{ Session::get('success') }}", {
                closeButton: true,
                progressBar: true,
                tapToDismiss: false,
                positionClass: 'toast-top-right',
            });
        @endif
        @if (Session::has('error'))
            toastr['error']("", "{{ Session::get('error') }}", {
                closeButton: true,
                tapToDismiss: false,
                positionClass: 'toast-top-right',
            });
        @endif
    });
</script>
