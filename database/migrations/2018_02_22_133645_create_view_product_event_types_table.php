<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewProductEventTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_product_event_types AS
            (
                SELECT
                    product_event_types.id,
                    product_event_types.product_id,
                    event_types.name as event_type_id,
                    product_event_types.created_at

                FROM `product_event_types`
                    JOIN event_types ON event_types.id = product_event_types.event_type_id
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
        DB::statement('DROP VIEW IF EXISTS view_product_event_types');
    }
}
