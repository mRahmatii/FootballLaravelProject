<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('backend.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/backend.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/backend.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('backend/css/rtl.css')}}"/>
</head>
<body>
<style>
    .mine{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #5b79a2;
    }
</style>
<div class="mine">

    @yield('content')

</div>
</body>
</html>
