<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('frontend-assets/img/dev.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/all.css') }}">
    @yield('my-styles')
    <title>@yield('title')</title>
</head>
<body>
