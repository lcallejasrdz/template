<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierContact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'job',
        'email',
        'phone',
        'cellphone'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
