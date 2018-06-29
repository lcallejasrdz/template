<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewProductState extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'state_id'
    ];

    public function scopeData($query)
    {
        return $query->get($this->select);
    }
}
