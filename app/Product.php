<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
        'address',
        'lat',
        'lng',
        'product_type_id',
        'inventory',
        'min_buy',
        'max_buy',
        'capacity',
        'preparation_time_id',
        'restocked_time_id',
        'duration',
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
        'status_id'
    ];

    /**
    * To allow soft deletes
    */
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function dateWithoutService(){
        return $this->hasMany(ProductDateWithoutService::class);
    }

    public function eventType(){
        return $this->hasMany(ViewProductEventType::class);
    }

    public function country(){
        return $this->hasMany(ViewProductCountry::class);
    }

    public function state(){
        return $this->hasMany(ViewProductState::class);
    }

    public function city(){
        return $this->hasMany(ViewProductCity::class);
    }

    public function daysWithoutService(){
        return $this->hasMany(ProductDateWithoutService::class);
    }
}
