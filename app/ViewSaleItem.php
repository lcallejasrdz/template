<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewSaleItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id',
        'sale_id',
        'product_id',
        'price',
        'quantity',
        'token',
        'created_at'
    ];
}
