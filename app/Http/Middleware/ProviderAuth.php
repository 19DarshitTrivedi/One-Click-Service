<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProviderAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->has('provider')){
            return redirect('/notAccess');
        }
        return $next($request);
    }
}
