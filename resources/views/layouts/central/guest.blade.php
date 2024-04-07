<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('layouts.components.shared.head')
</head>
<body class="font-sans antialiased">
<x-banner/>

<div class="min-h-screen bg-gray-100 dark:bg-gray-700">
    <div class="font-sans text-gray-900 dark:text-gray-100 antialiased">
        {{ $slot }}
    </div>
</div>
@include('layouts.components.shared.footer')
</body>
</html>
