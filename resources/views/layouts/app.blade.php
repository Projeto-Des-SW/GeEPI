<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" href="{{ asset('/images/home/logo_geepi.svg') }}" type="image/svg+xml">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>GeEPI</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="/css/layouts/style.css">
    <link rel="stylesheet" href="/css/home/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <!-- Scripts -->
    @vite(['resources' . DIRECTORY_SEPARATOR . 'sass' . DIRECTORY_SEPARATOR . 'app.scss', 'resources' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR . 'app.js'])


    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    @yield('css')


</head>
<body style="background-color: white">
    <div id="app">
        <!-- #Style da div# style="background: #1C3751; height: 87.6vh; margin: 0px; padding: 0px;" -->
        @include('layouts.components.navbar')
        <main class="py-4">
            @include('layouts.components.messages')
            @yield('content')
        </main>
    </div>



     @include('layouts.components.footer')

    <script>
        $(document).ready(function() {
            $('#telefone').mask('(99) 9 9999-9999');
            $('#cpf').mask('999.999.999-99');
        });
    </script>
</body>
</html>
