<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LivewirePathBasedLayout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $centralDomains = config('tenancy.central_domains');
        config(['EntityType' => 'central']);
        if(!in_array(request()->getHttpHost(),$centralDomains, true)){
            config(['livewire.layout' => 'layouts.tenant.app']);
            config(['EntityType' => 'tenant']);
        }
        return $next($request);
    }
}
