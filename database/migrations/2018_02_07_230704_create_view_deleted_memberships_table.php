<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewDeletedMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_deleted_memberships AS
            (
                SELECT
                    memberships.id,
                    memberships.name,
                    memberships.quantity,
                    memberships.monthly_cost,
                    memberships.annual_cost,
                    memberships.created_at

                FROM `memberships`

                WHERE memberships.deleted_at IS NOT NULL
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
        DB::statement('DROP VIEW IF EXISTS view_deleted_memberships');
    }
}
