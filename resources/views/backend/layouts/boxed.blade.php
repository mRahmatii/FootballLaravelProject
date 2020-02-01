<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="{{asset('backend/css/AdminLTE.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.css')}}"/>

    <link rel="stylesheet" href="{{asset('backend/css/rtl.css')}}"/>
{{--    <link rel="stylesheet" href="{{asset('backend/css/jquery.css')}}"/>--}}
<!-- ADD THE CLASS layout-boxed TO GET A BOXED LAYOUT -->
    <link rel="stylesheet" href="{{asset('backend/css/skins/font-awesome-panel.css')}}"/>
    <link rel="stylesheet" href="{{asset('backend/css/skins/skin-purple.css')}}"/>
    <link rel="stylesheet" href="{{asset('backend/css/ionicons.css')}}"/>
    <link rel="stylesheet" href="{{asset('libs/select2/css/select2.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('libs/babakhani/css/persian-datepicker.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/backend.min.css')}}"/>


    @yield('stylesheets')

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>

<body class="hold-transition skin-purple fixed sidebar-mini">
<div class="loading">
<img class="d-none" src="{{asset('img/loading.png')}}">
</div>

<!-- Site wrapper -->
<div class="wrapper">

    @include('backend.layouts.header')
    @include('backend.layouts.sidebar')
    @yield('content')
    @include('backend.layouts.footer')

    <div class="control-sidebar-bg"></div>
</div>
<style>

    .loading{
        display: none;
        height: 100%;
        width: 100%;
        position: fixed;
        cursor: wait;
        z-index: 99;
        background-color: rgba(0,0,0,0.5);
    }
    .loading  .d-none{
        top: 50%;
        left: 50%;
        position: fixed;
        max-width: 400px;
    }

</style>

<script src="{{ asset('backend/js/jquery.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('backend/js/adminlte.min.js') }}"></script>
<script src="{{ asset('backend/js/sweetalert.js') }}"></script>
<script src="{{ asset('libs/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('backend/js/public.js') }}"></script>
<script src="{{ asset('libs/babakhani/js/persian-date.min.js') }}"></script>
<script src="{{ asset('libs/babakhani/js/persian-datepicker.min.js') }}"></script>


@yield('scripts')
</body>
</html>
