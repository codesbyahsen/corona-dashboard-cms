<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="X-CSRF-TOKEN" content="{{ csrf_token() }}" />
    <title>{{ config('app.name', 'Corona') }} - @yield('title')</title>

    @include('admin.partials.links')
</head>

<body>
    <div class="container-scroller">
        @include('admin.partials.sidebar-nav')

        <div class="container-fluid page-body-wrapper">
            @include('admin.partials.header-nav')

            <div class="main-panel">
                @yield('content')

                @include('admin.partials.footer')
            </div>
        </div>
    </div>

    @include('admin.partials.scripts')
</body>

</html>
