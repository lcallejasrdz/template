<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Redirect;

class SentinelCustomer
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
        if(!Sentinel::check())
            return Redirect::to('login')->with('info', trans('auth.crud.guest'));
        elseif(Sentinel::getUser()->role_id != 5)
            return Redirect::back();
        else
            return $next($request);
    }
}
