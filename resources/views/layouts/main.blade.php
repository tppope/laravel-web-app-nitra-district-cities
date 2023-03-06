<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite('resources/sass/app.scss')

    @vite('resources/js/app.js')

    @livewireStyles

</head>
<body class="d-flex flex-column min-vh-100">
<x-main-header/>
<main {{ $attributes }}>
    {{ $slot }}
</main>
<x-main-footer class="mt-auto"/>
@livewireScripts
</body>
</html>
