<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewMembership extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id',
        'name',
        'quantity',
        'monthly_cost',
        'annual_cost',
        'created_at'
    ];

    public function scopeData($query)
    {
        return $query->get($this->select);
    }
}
