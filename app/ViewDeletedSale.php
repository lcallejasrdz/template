<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewDeletedSale extends Model
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
        return $query->get($this->select);
    }
}
