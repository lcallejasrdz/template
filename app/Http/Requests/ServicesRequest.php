<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET': {
                return [];
            }
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'user_id' => 'required',
                    'category_id' => 'required',
                    'subcategory_id' => 'required',
                    'name' => 'required|min:3|max:255|unique:products,name',
                    'description' => 'required|min:3|max:1000',
                    'price' => 'required|numeric',
                    'product_unity_id' => 'required',
                    'img_1' => 'required|max:2097|mimes:jpg,jpeg,png',
                    'img_2' => 'max:2097|mimes:jpg,jpeg,png',
                    'img_3' => 'max:2097|mimes:jpg,jpeg,png',
                    'img_4' => 'max:2097|mimes:jpg,jpeg,png',
                    'img_5' => 'max:2097|mimes:jpg,jpeg,png',
                    'address' => 'required_if:ubication,1',
                    'min_buy' => 'required|numeric',
                    'max_buy' => 'required|numeric',
                    'capacity' => 'required|numeric',
                    'preparation_time_id' => 'required',
                    'duration' => 'required|numeric',

                    'monday_init' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,friday_init,saturday_init,sunday_init,tuesday_finish,wednesday_finish,thursday_finish,friday_finish,saturday_finish,sunday_finish',
                    'monday_finish' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,friday_init,saturday_init,sunday_init,tuesday_finish,wednesday_finish,thursday_finish,friday_finish,saturday_finish,sunday_finish',

                    'tuesday_init' => 'required_without_all:monday_init,wednesday_init,thursday_init,friday_init,saturday_init,sunday_init,monday_finish,wednesday_finish,thursday_finish,friday_finish,saturday_finish,sunday_finish',
                    'tuesday_finish' => 'required_without_all:monday_init,wednesday_init,thursday_init,friday_init,saturday_init,sunday_init,monday_finish,wednesday_finish,thursday_finish,friday_finish,saturday_finish,sunday_finish',

                    'wednesday_init' => 'required_without_all:tuesday_init,monday_init,thursday_init,friday_init,saturday_init,sunday_init,tuesday_finish,monday_finish,thursday_finish,friday_finish,saturday_finish,sunday_finish',
                    'wednesday_finish' => 'required_without_all:tuesday_init,monday_init,thursday_init,friday_init,saturday_init,sunday_init,tuesday_finish,monday_finish,thursday_finish,friday_finish,saturday_finish,sunday_finish',

                    'thursday_init' => 'required_without_all:tuesday_init,wednesday_init,monday_init,friday_init,saturday_init,sunday_init,tuesday_finish,wednesday_finish,monday_finish,friday_finish,saturday_finish,sunday_finish',
                    'thursday_finish' => 'required_without_all:tuesday_init,wednesday_init,monday_init,friday_init,saturday_init,sunday_init,tuesday_finish,wednesday_finish,monday_finish,friday_finish,saturday_finish,sunday_finish',

                    'friday_init' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,monday_init,saturday_init,sunday_init,tuesday_finish,wednesday_finish,thursday_finish,monday_finish,saturday_finish,sunday_finish',
                    'friday_finish' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,monday_init,saturday_init,sunday_init,tuesday_finish,wednesday_finish,thursday_finish,monday_finish,saturday_finish,sunday_finish',

                    'saturday_init' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,friday_init,monday_init,sunday_init,tuesday_finish,wednesday_finish,thursday_finish,friday_finish,monday_finish,sunday_finish',
                    'saturday_finish' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,friday_init,monday_init,sunday_init,tuesday_finish,wednesday_finish,thursday_finish,friday_finish,monday_finish,sunday_finish',

                    'sunday_init' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,friday_init,saturday_init,monday_init,tuesday_finish,wednesday_finish,thursday_finish,friday_finish,saturday_finish,monday_finish',
                    'sunday_finish' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,friday_init,saturday_init,monday_init,tuesday_finish,wednesday_finish,thursday_finish,friday_finish,saturday_finish,monday_finish',

                    'status_id' => 'required'
                ];
            }
            case 'PUT': {
                return [
                    'user_id' => 'required',
                    'category_id' => 'required',
                    'subcategory_id' => 'required',
                    'name' => 'required|min:3|max:255|unique:products,name,'.$this->id,
                    'description' => 'required|min:3|max:1000',
                    'price' => 'required|numeric',
                    'product_unity_id' => 'required',
                    'img_1' => 'required|max:2097|mimes:jpg,jpeg,png',
                    'img_2' => 'max:2097|mimes:jpg,jpeg,png',
                    'img_3' => 'max:2097|mimes:jpg,jpeg,png',
                    'img_4' => 'max:2097|mimes:jpg,jpeg,png',
                    'img_5' => 'max:2097|mimes:jpg,jpeg,png',
                    'address' => 'required_if:ubication,1',
                    'min_buy' => 'required|numeric',
                    'max_buy' => 'required|numeric',
                    'capacity' => 'required|numeric',
                    'preparation_time_id' => 'required',
                    'duration' => 'required|numeric',

                    'monday_init' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,friday_init,saturday_init,sunday_init,tuesday_finish,wednesday_finish,thursday_finish,friday_finish,saturday_finish,sunday_finish',
                    'monday_finish' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,friday_init,saturday_init,sunday_init,tuesday_finish,wednesday_finish,thursday_finish,friday_finish,saturday_finish,sunday_finish',

                    'tuesday_init' => 'required_without_all:monday_init,wednesday_init,thursday_init,friday_init,saturday_init,sunday_init,monday_finish,wednesday_finish,thursday_finish,friday_finish,saturday_finish,sunday_finish',
                    'tuesday_finish' => 'required_without_all:monday_init,wednesday_init,thursday_init,friday_init,saturday_init,sunday_init,monday_finish,wednesday_finish,thursday_finish,friday_finish,saturday_finish,sunday_finish',

                    'wednesday_init' => 'required_without_all:tuesday_init,monday_init,thursday_init,friday_init,saturday_init,sunday_init,tuesday_finish,monday_finish,thursday_finish,friday_finish,saturday_finish,sunday_finish',
                    'wednesday_finish' => 'required_without_all:tuesday_init,monday_init,thursday_init,friday_init,saturday_init,sunday_init,tuesday_finish,monday_finish,thursday_finish,friday_finish,saturday_finish,sunday_finish',

                    'thursday_init' => 'required_without_all:tuesday_init,wednesday_init,monday_init,friday_init,saturday_init,sunday_init,tuesday_finish,wednesday_finish,monday_finish,friday_finish,saturday_finish,sunday_finish',
                    'thursday_finish' => 'required_without_all:tuesday_init,wednesday_init,monday_init,friday_init,saturday_init,sunday_init,tuesday_finish,wednesday_finish,monday_finish,friday_finish,saturday_finish,sunday_finish',

                    'friday_init' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,monday_init,saturday_init,sunday_init,tuesday_finish,wednesday_finish,thursday_finish,monday_finish,saturday_finish,sunday_finish',
                    'friday_finish' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,monday_init,saturday_init,sunday_init,tuesday_finish,wednesday_finish,thursday_finish,monday_finish,saturday_finish,sunday_finish',

                    'saturday_init' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,friday_init,monday_init,sunday_init,tuesday_finish,wednesday_finish,thursday_finish,friday_finish,monday_finish,sunday_finish',
                    'saturday_finish' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,friday_init,monday_init,sunday_init,tuesday_finish,wednesday_finish,thursday_finish,friday_finish,monday_finish,sunday_finish',

                    'sunday_init' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,friday_init,saturday_init,monday_init,tuesday_finish,wednesday_finish,thursday_finish,friday_finish,saturday_finish,monday_finish',
                    'sunday_finish' => 'required_without_all:tuesday_init,wednesday_init,thursday_init,friday_init,saturday_init,monday_init,tuesday_finish,wednesday_finish,thursday_finish,friday_finish,saturday_finish,monday_finish',

                    'status_id' => 'required'
                ];
            }
            case 'PATCH': {
                return [];
            }
            default: {
                break;
            }
        }
        return [];
    }
}
