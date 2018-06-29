<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'first_name',
        'last_name',
        'email',
        'password',
        'gender_id',
        'birthdate',
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
        'last_login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
    * To allow soft deletes
    */
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = \Hash::make($valor);
        }
    }

    public function contact(){
        return $this->hasMany(SupplierContact::class);
    }
}
