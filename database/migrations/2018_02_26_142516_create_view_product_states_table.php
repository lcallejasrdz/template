<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewProductStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_product_states AS
            (
                SELECT
                    product_states.id,
                    product_states.product_id,
                    states.name as state_id,
                    product_states.created_at

                FROM `product_states`
                    JOIN states ON states.id = product_states.state_id
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
        DB::statement('DROP VIEW IF EXISTS view_product_states');
    }
}
