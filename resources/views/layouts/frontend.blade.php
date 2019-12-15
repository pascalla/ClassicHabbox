<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ClubHabbo » Cooler then the Ice Cafe!</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="container">
        <div class="header mt-2">
            <div class="row">
                <div class="col-12">
                    <img src="/img/logo.gif" class="logo" alt="ClubHabbo"/>
                </div>

                <div class="col-12">
                    <div class="navigation-container mt-5">
                        <a href="#">Home</a>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')
    </div>


</body>
