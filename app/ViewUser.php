<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewUser extends Model
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
        'role_id',
        'status_id',
        'created_at'
    ];

    public function scopeData($query)
    {
        return $query->where('id', '!=', 1)->get($this->select);
    }
}
