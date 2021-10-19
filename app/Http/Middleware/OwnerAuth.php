<?php

namespace App\Http\Middleware;

use Closure;

class OwnerAuth
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
        return $next($request);
    }
    
    public function handle($request, Closure $next)
    {
        if(auth()->check() && auth()->user()->role == 'owner') {
            return $next($request);
        }
        return redirect('/main');
    }
    
}
