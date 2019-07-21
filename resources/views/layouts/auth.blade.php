<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Вход на сайт или Регистрация</title>
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    <link href="{{ asset('css/alertify.min.css') }}" rel="stylesheet">
</head>
<body class="text-center">
    
    @yield('content')

    {{--    Попробовать исвользовать секции--}}
    {{--    https://stackoverflow.com/questions/46939027/laravel-5-5-referenceerror-is-not-defined--}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/alertify.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @include('inc.messages')
</body>
</html>
