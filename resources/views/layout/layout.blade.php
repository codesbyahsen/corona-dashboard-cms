<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @include('partials.links')
</head>

<body>
    <div class="container-scroller">
        @include('partials.sidebar-nav')

        <div class="container-fluid page-body-wrapper">
            @include('partials.header-nav')

            <div class="main-panel">
                @yield('page-content')

                @include('partials.footer')
            </div>
        </div>
    </div>

    @include('partials.scripts')
</body>

</html>
