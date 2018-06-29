<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use App\Product;
use Session;

class CartController extends Controller
{
    public function __construct()
    {
        if(!Session::has('cart')) Session::put('cart', array());
    }

    /**
    *
    * Add Product to Cart
    *
    **/
    public function setProduct(Request $request)
    {
        $product = Product::find($request->id);
        $product->description = strip_tags($product->description);

        $cart = Session::get('cart');

        if(isset($cart[$product->id])){
            $cart[$product->id]->quantity += $request->quantity;
        }else{
            $cart[$product->id] = $product;
            $cart[$product->id]->quantity = $request->quantity;
        }

        Session::put('cart', $cart);

        return Redirect::route('cart');
    }

    /**
    *
    * Delete Product of Cart
    *
    **/
    public function deleteProduct(Request $request)
    {
        $cart = Session::get('cart');

        unset($cart[$request->id]);

        Session::put('cart', $cart);

        $cart = Session::get('cart');
        if(count($cart) <= 0){
            return Redirect::route('search');
        }

        return Redirect::back()->with('success', trans('cart.deleteproduct.success'));
    }
}
