<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
        'postal_code'
    ];

    /**
    * To allow soft deletes
    */
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function saleItem(){
        return $this->hasMany(ViewSaleItem::class);
    }
}
