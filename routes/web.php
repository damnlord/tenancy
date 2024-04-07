<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.central.welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('pages.central.dashboard');
    })->name('dashboard');
});
