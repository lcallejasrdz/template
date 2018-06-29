<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_customers AS
            (
                SELECT
                    users.id,
                    users.slug,
                    users.first_name,
                    users.last_name,
                    users.email,
                    genders.name as gender_id,
                    users.birthdate,
                    users.phone,
                    users.cellphone,
                    roles.name as role_id,
                    statuses.name as status_id,
                    users.last_login,
                    users.created_at

                FROM `users`
                    JOIN genders ON genders.id = users.gender_id
                    JOIN roles ON roles.id = users.role_id
                    JOIN statuses ON statuses.id = users.status_id

                WHERE users.role_id = 5
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
        DB::statement('DROP VIEW IF EXISTS view_customers');
    }
}
