<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewProductCity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'city_id'
    ];

    public function scopeData($query)
    {
        return $query->get($this->select);
    }
}
