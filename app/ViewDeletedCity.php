<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewDeletedCity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id',
        'state_id',
        'name',
        'created_at'
    ];

    public function scopeData($query)
    {
        return $query->get($this->select);
    }
}
