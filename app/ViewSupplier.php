<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewSupplier extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id',
        'slug',
        'first_name',
        'last_name',
        'email',
        'phone',
        'cellphone',
        'country_id',
        'state_id',
        'city_id',
        'municipality',
        'colony',
        'street',
        'no_ext',
        'no_int',
        'postal_code',
        'rfc',
        'social_reason',
        'commercial_name',
        'person_type_id',
        'web_site',
        'logo',
        'email_paypal',
        'legal_representant',
        'date_public_writing',
        'no_public_notary',
        'entity_public_notary',
        'inscription_folio',
        'constitutive_act',
        'hacienda_register',
        'legal_representative_identification',
        'address_proof',
        'policies',
        'membership_id',
        'role_id',
        'status_id',
        'last_login',
        'created_at'
    ];

    public function scopeData($query)
    {
        return $query->get($this->select);
    }
}
