<?php

namespace App\Http\Middleware;

use Closure;

use Route;
use Redirect;
use Sentinel;
use App\Product;
use App\Sale;
use App\SaleItem;
use Illuminate\Support\Facades\DB;

class PermissionsSaleMiddleware
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
            return $next($request);
        }else if($user->role_id == 3){ // Permisos de Call Center
            if($routename == 'index'){
                return $next($request);
            }else if($routename == 'show'){
                return $next($request);
            }else{
                return Redirect::back();
            }
        }else if($user->role_id == 4){ // Permisos de Proveedor
            if($routename == 'index'){
                return $next($request);
            }else if($routename == 'show'){
                $id = $request->route('id');
                $count = Product::where('user_id', $user->id)
                                    ->whereExists(function ($query) use ($id) {
                                        $query->select(DB::raw(1))
                                              ->from('sale_items')
                                              ->whereRaw('sale_items.product_id = products.id')
                                              ->whereExists(function ($query) use($id) {
                                                  $query->select(DB::raw(1))
                                                      ->from('sales')
                                                      ->whereRaw('sales.id = sale_items.sale_id')
                                                      ->whereRaw('sales.id = '.$id);
                                              });
                                    })
                                    ->count();
                if($count > 0){
                    return $next($request);
                }else{
                    return Redirect::back();
                }
            }else if($routename == 'edit'){
                $id = $request->route('id');
                $count = Product::where('user_id', $user->id)
                                    ->whereExists(function ($query) use ($id) {
                                        $query->select(DB::raw(1))
                                              ->from('sale_items')
                                              ->whereRaw('sale_items.product_id = products.id')
                                              ->whereExists(function ($query) use ($id) {
                                                  $query->select(DB::raw(1))
                                                      ->from('sales')
                                                      ->whereRaw('sales.id = sale_items.sale_id')
                                                      ->whereRaw('sales.id = '.$id);
                                              });
                                    })
                                    ->count();
                if($count > 0){
                    return $next($request);
                }else{
                    return Redirect::back();
                }
            }else if($routename == 'update'){
                $id = $request->route('id');
                $count = Product::where('user_id', $user->id)
                                    ->whereExists(function ($query) use($id) {
                                        $query->select(DB::raw(1))
                                              ->from('sale_items')
                                              ->whereRaw('sale_items.product_id = products.id')
                                              ->whereExists(function ($query) use($id) {
                                                  $query->select(DB::raw(1))
                                                      ->from('sales')
                                                      ->whereRaw('sales.id = sale_items.sale_id')
                                                      ->whereRaw('sales.id = '.$id);
                                              });
                                    })
                                    ->count();
                if($count > 0){
                    return $next($request);
                }else{
                    return Redirect::back();
                }
            }else if($routename == 'updateStatus'){
                $status = SaleItem::find($request->route('id'))->sale_status_id;
                if($status < 3){
                    $user_id = Product::find(SaleItem::find($request->route('id'))->product_id)->user_id;
                    if($user_id == $user->id){
                        return $next($request);
                    }else{
                        return Redirect::back();
                    }
                }else{
                    return Redirect::back();
                }
            }else{
                return Redirect::back();
            }
        }else if($user->role_id == 5){ // Permisos de Cliente
            if($routename == 'index'){
                return $next($request);
            }else if($routename == 'show'){
                return $next($request);
            }else if($routename == 'cancelItem'){
                $item = SaleItem::find($request->route('id'));  
                $user_id = Sale::find($item->sale_id)->user_id;
                if($user_id == $user->id && $item->sale_status_id < 3){
                    return $next($request);
                }else{
                    return Redirect::back();
                }
            }else{
                return Redirect::back();
            }
        }else{
            return $next($request);
        }
    }
}
