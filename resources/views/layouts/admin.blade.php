<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Панель управления</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alertify.min.css') }}" rel="stylesheet">
</head>
<body>
    @include('admin.navigation.top')

    <div class="container-fluid">
        <div class="row">
            @include('admin.navigation.left')
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/alertify.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @include('inc.messages')
    @yield('js')
</body>
</html>
