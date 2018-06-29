<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewCustomer extends Model
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
        'gender_id',
        'birthdate',
        'phone',
        'cellphone',
        'role_id',
        'status_id',
        'last_login',
        'created_at'
    ];

    public function scopeData($query)
    {
        return $query->get($this->select);
    }
}
