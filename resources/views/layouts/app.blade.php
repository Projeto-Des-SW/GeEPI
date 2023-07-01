<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="/css/layouts/style.css">
    <link rel="stylesheet" href="/css/home/style.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!-- #Style da div# style="background: #1C3751; height: 87.6vh; margin: 0px; padding: 0px;" -->
        @include('layouts.components.navbar')
        <main class="py-4">
            @include('layouts.components.messages')
            @yield('content')
        </main>
    </div>

    <!-- @include('layouts.components.footer') -->
</body>
</html>
