<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::middleware([
    'web',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->name('tenant.')->group(function () {
    Route::get('/dashboard', function () {

        mkdir('/var/www/html/storage/test', 0777, true);
        mkdir('/var/www/html/storage/test/app/public', 0777, true);
        mkdir("/var/www/html/storage/test/framework/cache", 0777, true);
     //   dd(Storage::disk('public')->path('profile-photos/aFyDzttVadvoHLBrMRCNNHX2cSGTIaAMigglLHfK.jpg'), Storage::disk('public')->url('profile-photos/aFyDzttVadvoHLBrMRCNNHX2cSGTIaAMigglLHfK.jpg'));
        return view('pages.tenant.dashboard');
    })->name('dashboard');
});

Route::group(['prefix' => config('sanctum.prefix', 'sanctum')], static function () {
    Route::get('/csrf-cookie', [CsrfCookieController::class, 'show'])
        ->middleware([
            'web',
            'universal',
            InitializeTenancyByDomain::class // Use tenancy initialization middleware of your choice
        ])->name('sanctum.csrf-cookie');
});
