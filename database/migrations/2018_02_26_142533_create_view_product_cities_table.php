<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewProductCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_product_cities AS
            (
                SELECT
                    product_cities.id,
                    product_cities.product_id,
                    cities.name as city_id,
                    product_cities.created_at

                FROM `product_cities`
                    JOIN cities ON cities.id = product_cities.city_id
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
        DB::statement('DROP VIEW IF EXISTS view_product_cities');
    }
}
