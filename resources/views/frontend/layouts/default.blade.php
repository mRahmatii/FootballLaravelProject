<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta')
    <link rel="stylesheet" href="{{ mix('/css/frontend.min.css') }}">
    @yield('stylesheets')

    @stack('header_scripts')
</head>
<body data-page="@yield('page_name')">

<div class="overlay-body"></div>

<div class="preloader">
    <div class="circle"></div>
</div>

<div class="loading-webapp">
    <div id="load-animation"></div>
</div>

@include('frontend.layouts.header')

<div class="site-content">
    @yield('content')
</div>

@include('frontend.layouts.footer')

<script src="{{ mix('/js/frontend.min.js') }}"></script>
<script src="{{ asset('/js/public.js') }}"></script>
@stack('footer_scripts')
</body>
</html>
