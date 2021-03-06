<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Candy Shop') }} - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}" type="text/javascript" defer></script>
    <script src="{{ mix('js/vendor.js') }}" type="text/javascript" defer></script>
    <script src="{{ mix('js/app.js') }}" type="text/javascript" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('components.header')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
