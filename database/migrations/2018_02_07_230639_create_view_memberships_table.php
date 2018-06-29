<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_memberships AS
            (
                SELECT
                    memberships.id,
                    memberships.name,
                    memberships.quantity,
                    memberships.monthly_cost,
                    memberships.annual_cost,
                    memberships.created_at

                FROM `memberships`

                WHERE memberships.deleted_at IS NULL
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
        DB::statement('DROP VIEW IF EXISTS view_memberships');
    }
}
