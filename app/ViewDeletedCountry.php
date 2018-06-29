<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewDeletedCountry extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id',
        'name',
        'created_at'
    ];

    public function scopeData($query)
    {
        return $query->get($this->select);
    }
}
