<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Sentinel;
use Illuminate\Support\Facades\DB;

class ViewSale extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id',
        'user_id',
        'payment_type_id',
        'total',
        'country_id',
        'state_id',
        'city_id',
        'municipality',
        'colony',
        'street',
        'no_ext',
        'no_int',
        'postal_code',
        'created_at'
    ];

    public function scopeData($query)
    {
        if(Sentinel::getUser()->role_id == 4){
            $id = Sentinel::getUser()->id;
            return $query->whereExists(function ($query) use ($id) {
                                    $query->select(DB::raw(1))
                                          ->from('sale_items')
                                          ->whereRaw('sale_items.sale_id = view_sales.id')
                                          ->whereExists(function ($query) use ($id) {
                                              $query->select(DB::raw(1))
                                                  ->from('products')
                                                  ->whereRaw('products.id = sale_items.product_id')
                                                  ->whereRaw('products.user_id = '.$id);
                                          });
                                })
                                ->get($this->select);
        }else{
            return $query->get($this->select);
        }
    }
}
