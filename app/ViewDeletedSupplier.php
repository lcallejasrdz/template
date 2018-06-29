<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewDeletedSupplier extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id',
        'slug',
        'first_name',
        'last_name',
        'social_reason',
        'email',
        'permission',
        'status',
        'created_at'
    ];

    public function scopeData($query)
    {
        return $query->get($this->select);
    }
}
