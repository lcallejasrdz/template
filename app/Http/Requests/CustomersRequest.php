<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomersRequest extends FormRequest
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
                    'first_name' => 'required|min:3|max:255',
                    'last_name' => 'required|min:3|max:255',
                    'gender_id' => 'required',
                    'birthdate' => 'required',
                    'phone' => 'required|min:4|max:25',
                    'cellphone' => 'required|min:4|max:25',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:6|max:16',
                    'password_confirm' => 'required|min:6|max:16|same:password',
                    'status_id' => 'required',
                    'role_id' => 'required'
                ];
            }
            case 'PUT': {
                return [
                    'first_name' => 'required|min:3|max:255',
                    'last_name' => 'required|min:3|max:255',
                    'gender_id' => 'required',
                    'birthdate' => 'required',
                    'phone' => 'required|min:4|max:25',
                    'cellphone' => 'required|min:4|max:25',
                    'email' => 'required|email|unique:users,email,'.$this->id,
                    'password' => 'max:16',
                    'password_confirm' => 'max:16|same:password',
                    'status_id' => 'required',
                    'role_id' => 'required'
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
