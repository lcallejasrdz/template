<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesRequest extends FormRequest
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
                return [];
            }
            case 'PUT': {
                return [
                    'country_id' => 'required',
                    'state_id' => 'required',
                    'city_id' => 'required',
                    'municipality' => 'required|min:3|max:255',
                    'colony' => 'required|min:3|max:255',
                    'street' => 'required|min:3|max:255',
                    'no_ext' => 'required|max:50',
                    'no_int' => 'max:50',
                    'postal_code' => 'required|min:3|max:5'
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
