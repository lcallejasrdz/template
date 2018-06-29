<?php

namespace App\Http\Middleware;

use Closure;

use Sentinel;
use Redirect;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Sentinel::check()) {
            return Redirect::route('dashboard');
        }

        return $next($request);
    }
}
