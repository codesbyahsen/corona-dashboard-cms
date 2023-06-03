<!-- plugins:js -->
<script src="{{ asset('assets') }}/vendors/js/vendor.bundle.base.js"></script>

<!-- Plugin js for this page -->
<script src="{{ asset('assets') }}/vendors/chart.js/Chart.min.js"></script>
<script src="{{ asset('assets') }}/vendors/progressbar.js/progressbar.min.js"></script>
<script src="{{ asset('assets') }}/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="{{ asset('assets') }}/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{ asset('assets') }}/vendors/owl-carousel-2/owl.carousel.min.js"></script>

<!-- inject:js -->
<script src="{{ asset('assets') }}/js/off-canvas.js"></script>
<script src="{{ asset('assets') }}/js/hoverable-collapse.js"></script>
<script src="{{ asset('assets') }}/js/misc.js"></script>
<script src="{{ asset('assets') }}/js/settings.js"></script>
<script src="{{ asset('assets') }}/js/todolist.js"></script>


@stack('injected-scripts')
{{-- <script>
    $.ajaxSetup({
        headers: {
            'Accepts': 'application/json',
            // 'Content-Type': 'application/json; charset=utf-8',
            'X-CSRF-TOKEN': $('meta[name="X-CSRF-TOKEN"]').attr('content')
        }
    });

    $('#screenshot').click(function(e) {
        e.preventDefault();
        var url = $(location).attr('href');
        var width = screen.width;
        var height = screen.height;

        $.ajax({
            type: 'POST',
            url: '/admin/screenshots/store',
            data: {
                'url': url,
                'width': width,
                'height': height
            },
            success: function(response) {
                console.log(response);
            },
            error: function(response) {
                console.log(response);
            }
        });
    });
</script> --}}
