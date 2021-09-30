<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Candy Shop') }} - @yield('title')</title>

    {{-- Scripts --}}
    <script src="{{ mix('js/manifest.js') }}" type="text/javascript" defer></script>
    <script src="{{ mix('js/vendor.js') }}" type="text/javascript" defer></script>
    <script src="{{ mix('js/app.js') }}" type="text/javascript" defer></script>

    {{-- Fonts --}}
    <!-- NO EXTERNAL FONT -->

    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" />
</head>
<body>
    {{-- Header --}}
    @include('layouts.header')

    <main class="py-4">
        {{-- Alerts --}}
        @include('components.alert')

        {{-- Content --}}
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    @include('layouts.footer')
</body>
</html>
