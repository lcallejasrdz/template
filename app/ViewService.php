<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Sentinel;
use DB;

class ViewService extends Model
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
        'address',
        'lat',
        'lng',
        'min_buy',
        'max_buy',
        'capacity',
        'preparation_time_id',
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
        'status_id',
        'created_at'
    ];

    public function scopeData($query)
    {
        if(Sentinel::getUser()->role_id == 4){
            $user_id = Sentinel::getUser()->id;
            return $query
                    ->whereExists(function ($query) use ($user_id) {
                        $query->select(DB::raw(1))
                              ->from('products')
                              ->whereRaw('products.id = view_services.id')
                              ->whereRaw('products.user_id = '.$user_id);
                    })
                    ->get($this->select);
        }else{
            return $query->get($this->select);
        }
    }
}
