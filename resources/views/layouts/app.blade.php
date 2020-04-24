<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
<header>
    <nav>
        <div class="container">
            <ul>
                <!-- Authentication Links -->
                @guest
{{--                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>--}}
{{--                    @if (Route::has('register'))--}}
{{--                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>--}}
{{--                    @endif--}}
                @else
{{--                    <li><a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"--}}
{{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                            {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                        </a></li>--}}
                    <li><a class="navbar-brand" href="{{ route('home') }}">Dashboard</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">@csrf</form>
            @endguest
        </div>
    </nav>
</header>
<div id="app">
    <main class="{{ isset($mainClass) ? $mainClass : '' }}">
        @yield('content')
    </main>
</div>
</body>
</html>
