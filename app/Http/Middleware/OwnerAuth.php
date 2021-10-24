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
    // user id 1のみが設定したURLにアクセスできるように
    public function handle($request, Closure $next)
    {
        if(auth()->check() && auth()->user()->id == 1) {
            return $next($request);
        }
        return redirect('/main');
    }
}
