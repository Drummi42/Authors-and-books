<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{__('Library by Boris Menshakov')}}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header id="header">
    <menu-component></menu-component>
    @yield('header')
</header>
<main id="app" style="margin-top: 25px;">
        @yield('content')
</main>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
