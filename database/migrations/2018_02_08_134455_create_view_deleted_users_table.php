<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewDeletedUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_deleted_users AS
            (
                SELECT
                    users.id,
                    users.slug,
                    users.first_name,
                    users.last_name,
                    users.email,
                    roles.name as role_id,
                    users.last_login,
                    users.created_at

                FROM `users`
                    JOIN roles ON roles.id = users.role_id

                WHERE users.role_id <= 3
                    AND users.deleted_at IS NOT NULL
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
        DB::statement('DROP VIEW IF EXISTS view_deleted_users');
    }
}
