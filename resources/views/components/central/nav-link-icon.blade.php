@props(['active', 'hero'=>'home'])

@php

    $classes_active_line = ($active ?? false)
                ? 'translate-y-0'
                : 'translate-y-full';
    $classes_active = ($active ?? false)
                ? 'bg-white/10'
                : 'group-hover:bg-white/10';

@endphp


<div class="w-full flex items-center gap-x-1.5 group select-none">
    <div class="w-1 rounded-xl h-8 bg-transparent transition-colors duration-200 relative overflow-hidden">
        <div
            class="absolute top-0 left-0 w-full h-[102%] group-hover:translate-y-0 {{$classes_active_line}} bg-red-600 transition-all duration-300"></div>
    </div>
    <a {{ $attributes }} wire:navigate
       class="text-white {{$classes_active}} w-full group-active:scale-95 self-stretch pl-2 rounded flex items-center space-x-2 transition-all duration-200 dark:group-hover:text-white dark:hover:text-white text-sm">
        <x-icon name="{{$hero}}"
                class="w-5 h-5 group-hover:text-red-600 dark:text-gray-600 transition-colors duration-200"/>
        <span class="font-QuicksandMedium">{{ $slot }}</span>
    </a>
</div>
