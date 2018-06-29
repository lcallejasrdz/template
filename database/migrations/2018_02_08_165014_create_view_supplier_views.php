<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewSupplierViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_suppliers AS
            (
                SELECT
                    users.id,
                    users.slug,
                    users.first_name,
                    users.last_name,
                    users.email,
                    users.phone,
                    users.cellphone,
                    countries.name as country_id,
                    states.name as state_id,
                    cities.name as city_id,
                    users.municipality,
                    users.colony,
                    users.street,
                    users.no_ext,
                    users.no_int,
                    users.postal_code,
                    users.rfc,
                    users.social_reason,
                    users.commercial_name,
                    person_types.name as person_type_id,
                    users.web_site,
                    users.logo,
                    users.email_paypal,
                    users.legal_representant,
                    users.date_public_writing,
                    users.no_public_notary,
                    users.entity_public_notary,
                    users.inscription_folio,
                    users.constitutive_act,
                    users.hacienda_register,
                    users.legal_representative_identification,
                    users.address_proof,
                    users.policies,
                    memberships.name as membership_id,
                    roles.name as role_id,
                    statuses.name as status_id,
                    users.last_login,
                    users.created_at

                FROM `users`
                    LEFT JOIN countries ON countries.id = users.country_id
                    LEFT JOIN states ON states.id = users.state_id
                    LEFT JOIN cities ON cities.id = users.city_id
                    JOIN person_types ON person_types.id = users.person_type_id
                    LEFT JOIN memberships ON memberships.id = users.membership_id
                    JOIN roles ON roles.id = users.role_id
                    JOIN statuses ON statuses.id = users.status_id

                WHERE users.role_id = 4
                    AND users.deleted_at IS NULL
            )
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS view_suppliers');
    }
}
