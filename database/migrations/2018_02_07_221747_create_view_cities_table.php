<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_cities AS
            (
                SELECT
                    cities.id,
                    states.name as state_id,
                    cities.name,
                    cities.created_at

                FROM `cities`
                    JOIN states ON states.id = cities.state_id

                WHERE cities.deleted_at IS NULL
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
        DB::statement('DROP VIEW IF EXISTS view_cities');
    }
}
