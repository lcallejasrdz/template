<?php

namespace App\Http\Middleware;

use Closure;

use Route;
use Redirect;
use Sentinel;

class PermissionsUserMiddleware
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
        $route = Route::current()->getActionName();
        $route = explode('@', $route);
        $routename = $route[1];

        $user = Sentinel::getUser();

        if($user->role_id == 1){ // Permisos de Administrador
            return $next($request);
        }else if($user->role_id == 2){ // Permisos de Operaciones
            if($routename == 'index'){
                return $next($request);
            }else if($routename == 'show'){
                return $next($request);
            }else if($routename == 'edit'){
                if($request->route('id') == $user->id){
                    return $next($request);
                }else{
                    return Redirect::back();
                }
            }else if($routename == 'update'){
                if($request->route('id') == $user->id){
                    return $next($request);
                }else{
                    return Redirect::back();
                }
            }else{
                return Redirect::back();
            }
        }else if($user->role_id == 3){ // Permisos de Call Center
            if($routename == 'index'){
                return $next($request);
            }else if($routename == 'show'){
                return $next($request);
            }else if($routename == 'edit'){
                if($request->route('id') == $user->id){
                    return $next($request);
                }else{
                    return Redirect::back();
                }
            }else if($routename == 'update'){
                if($request->route('id') == $user->id){
                    return $next($request);
                }else{
                    return Redirect::back();
                }
            }else{
                return Redirect::back();
            }
        }else if($user->role_id == 4){ // Permisos de Proveedor
            return Redirect::back();
        }else if($user->role_id == 5){ // Permisos de Cliente
            return Redirect::back();
        }else{
            return $next($request);
        }
    }
}
