<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class AdminAndOperator
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
        if (Auth::user() && Auth::user()->roles_id <= 2 ) {
            return $next($request);
 
        }

        return App::abort(Auth::check() ? 403 :401,
        Auth::check() ? 'Forbidden' : 'Unauthorized');
        
    }
}
