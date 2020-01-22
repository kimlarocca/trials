<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="{{ isset($bodyClass) ? $bodyClass : '' }}">
<main>
    <div id="app">
        @yield('content')
    </div>
</main>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
