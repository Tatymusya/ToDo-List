<!DOCTYPE html>
<html class="base" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="color-scheme" content="light dark">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preload"
            href="{{ Vite::asset('resources/fonts/montserrat/Montserrat-VariableFont_wght.woff2') }}"
            as="font"
            type="font/woff2"
            crossorigin
        />

        <link rel="preload"
            href="{{ Vite::asset('resources/fonts/montserrat/Montserrat-Italic-VariableFont_wght.woff2') }}"
            as="font"
            type="font/woff2"
            crossorigin
        />

        <!-- Styles -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            <link rel="stylesheet" href="{{ Vite::asset('resources/css/light-theme.css') }}"  media="(prefers-color-scheme: light)">
            <link rel="stylesheet" href="{{ Vite::asset('resources/css/dark-theme.css') }}"  media="(prefers-color-scheme: dark)">
            @vite(['resources/css/app.css'])
        @endif
        @inertiaHead
    </head>
    <body class="app">
        @inertia
        <script type="module" src="{{ Vite::asset('resources/js/app.js') }}"></script>
    </body>
</html>
