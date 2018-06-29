<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDateWithoutService extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'dates_without_service_from',
        'dates_without_service_to'
    ];
}
