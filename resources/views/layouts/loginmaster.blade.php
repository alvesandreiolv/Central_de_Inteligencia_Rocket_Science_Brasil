<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/personal/js/app.js') }}"></script>
    <script src="{{ asset('public/bootstrapaero/js/bootstrap.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('public/personal/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/bootstrapaero/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/font-awesome-4.7.0/css/font-awesome.css') }}">

    <link rel="shortcut icon" href="{{ asset('public/images/assets/favicon1.png') }}">

</head>


<body>

    <main role="main" class="container">
        @yield('content')
    </main>

</body>


</html>
