<?php

namespace App\Http\Middleware;

use App\Tenant;
use Closure;

class VerifyTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $tenant = Tenant::where('name', $request->tenant);
        if($tenant){
            return $next($request);
        }

        return redirect()->route('home');
    }
}
