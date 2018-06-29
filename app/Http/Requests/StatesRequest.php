<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatesRequest extends FormRequest
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
                    'name' => 'required|min:3|max:255',
                    'country_id' => 'required'
                ];
            }
            case 'PUT': {
                return [
                    'name' => 'required|min:3|max:255',
                    'country_id' => 'required'
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
