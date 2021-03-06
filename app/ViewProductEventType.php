<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewProductEventType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'event_type_id'
    ];

    public function scopeData($query)
    {
        return $query->get($this->select);
    }
}
