<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('layouts.components.shared.head')
</head>
<body class="font-sans antialiased">
<x-banner/>

<div class="min-h-screen bg-gray-100 dark:bg-gray-700">
    @livewire('components.menus.tenant.main-navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
@include('layouts.components.shared.footer')
</body>
</html>
