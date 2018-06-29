<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuppliersRequest extends FormRequest
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
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|min:6|max:16',
                    'password_confirm' => 'required|min:6|max:16|same:password',
                    'phone' => 'required|min:4|max:25',
                    'cellphone' => 'required|min:4|max:25',
                    'logo' => 'required|max:2097|mimes:jpg,jpeg,png',
                    'country_id' => 'required',
                    'state_id' => 'required',
                    'city_id' => 'required',
                    'municipality' => 'required|min:3|max:255',
                    'colony' => 'required|min:3|max:255',
                    'street' => 'required|min:3|max:255',
                    'no_ext' => 'required|max:50',
                    'no_int' => 'max:50',
                    'postal_code' => 'required|min:3|max:5',
                    'rfc' => 'required|min:3|max:15|unique:users,rfc',
                    'social_reason' => 'required|min:3|max:255',
                    'commercial_name' => 'required|min:3|max:255|unique:users,commercial_name',
                    'person_type_id' => 'required',
                    'legal_representant' => 'required|min:3|max:255',
                    'date_public_writing' => 'required_if:person_type_id,1|date|date_format:Y-m-d',
                    'no_public_notary' => 'required_if:person_type_id,1|max:255',
                    'entity_public_notary' => 'required_if:person_type_id,1|min:3|max:255',
                    'inscription_folio' => 'required_if:person_type_id,1|min:3|max:255',
                    'constitutive_act' => 'required_if:person_type_id,1|max:2097|mimes:jpg,jpeg,png,pdf',
                    'hacienda_register' => 'max:2097|mimes:jpg,jpeg,png,pdf',
                    'legal_representative_identification' => 'max:2097|mimes:jpg,jpeg,png,pdf',
                    'address_proof' => 'max:2097|mimes:jpg,jpeg,png,pdf',
                    'email_paypal' => 'required|email',
                    'policies' => 'max:2097|mimes:jpg,jpeg,png,pdf',
                    'status_id' => 'required',
                    'role_id' => 'required'
                ];
            }
            case 'PUT': {
                return [
                    'first_name' => 'required|min:3|max:255',
                    'last_name' => 'required|min:3|max:255',
                    'email' => 'required|email|unique:users,email,'.$this->id,
                    'password' => 'max:16',
                    'password_confirm' => 'max:16|same:password',
                    'phone' => 'required|min:4|max:25',
                    'cellphone' => 'required|min:4|max:25',
                    'logo' => 'required|max:2097|mimes:jpg,jpeg,png',
                    'country_id' => 'required',
                    'state_id' => 'required',
                    'city_id' => 'required',
                    'municipality' => 'required|min:3|max:255',
                    'colony' => 'required|min:3|max:255',
                    'street' => 'required|min:3|max:255',
                    'no_ext' => 'required|max:50',
                    'no_int' => 'max:50',
                    'postal_code' => 'required|min:3|max:5',
                    'rfc' => 'required|min:3|max:15|unique:users,rfc,'.$this->id,
                    'social_reason' => 'required|min:3|max:255',
                    'commercial_name' => 'required|min:3|max:255|unique:users,commercial_name,'.$this->id,
                    'person_type_id' => 'required',
                    'legal_representant' => 'required|min:3|max:255',
                    'date_public_writing' => 'required_if:person_type_id,1|date|date_format:Y-m-d',
                    'no_public_notary' => 'required_if:person_type_id,1|max:255',
                    'entity_public_notary' => 'required_if:person_type_id,1|min:3|max:255',
                    'inscription_folio' => 'required_if:person_type_id,1|min:3|max:255',
                    'constitutive_act' => 'required_if:person_type_id,1|max:2097|mimes:jpg,jpeg,png,pdf',
                    'hacienda_register' => 'max:2097|mimes:jpg,jpeg,png,pdf',
                    'legal_representative_identification' => 'max:2097|mimes:jpg,jpeg,png,pdf',
                    'address_proof' => 'max:2097|mimes:jpg,jpeg,png,pdf',
                    'email_paypal' => 'required|email',
                    'policies' => 'max:2097|mimes:jpg,jpeg,png,pdf',
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
