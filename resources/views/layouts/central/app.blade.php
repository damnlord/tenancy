<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('layouts.components.shared.head')
</head>
<body class="body bg-white dark:bg-[#0F172A]">
<div class="" x-data="{
            menuOpen: false,
            init() {
                    if (window.innerWidth > 768)
                        this.menuOpen = true;

                    },
            }">
    <div
        class="flex items-center pl-4 h-16 text-semibold text-gray-100 bg-[#1c212c] shadow-2xl shadow-lg shadow-[#1c212c]/50">
        <div class="w-72 flex items-center">
            <button class="p-1 mr-4" @click="menuOpen = !menuOpen">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            Central
        </div>
        <div class="w-full ">
            @if (isset($header))
                <h1 class="logo text-white transform ease-in-out duration-500 flex-none h-full flex items-center">
                    {{ $header }}
                </h1>
            @endif
        </div>
    </div>
    <div class="flex">
        <div class="w-72 transition-all duration-300 max-md:-ml-72" :class="{ '-ml-72': !menuOpen, 'max-md:-ml-72':!menuOpen }">
            @livewire('components.menus.central.main-navigation-menu')
        </div>
        <div class="w-full">
            <div class="transform ease-in-out duration-500 pt-4 px-2 md:px-5 pb-4 ">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
@include('layouts.components.shared.footer')
</body>

</html>
