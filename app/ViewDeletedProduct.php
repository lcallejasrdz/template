<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewDeletedProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'product_module_id',
        'user_id',
        'category_id',
        'subcategory_id',
        'name',
        'slug',
        'description',
        'price',
        'percent_buy_id',
        'product_unity_id',
        'img_1',
        'img_2',
        'img_3',
        'img_4',
        'img_5',
        'product_type_id',
        'inventory',
        'min_buy',
        'preparation_time_id',
        'restocked_time_id',
        'monday_init',
        'monday_finish',
        'tuesday_init',
        'tuesday_finish',
        'wednesday_init',
        'wednesday_finish',
        'thursday_init',
        'thursday_finish',
        'friday_init',
        'friday_finish',
        'saturday_init',
        'saturday_finish',
        'sunday_init',
        'sunday_finish',
        'status_id',
        'created_at'
    ];

    public function scopeData($query)
    {
        return $query->get($this->select);
    }
}
