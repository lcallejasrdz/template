<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewDeletedUser extends Model
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
        'email',
        'permission',
        'status',
        'created_at'
    ];

    public function scopeData($query)
    {
        return $query->where('id', '!=', 1)->get($this->select);
    }
}
