<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewProductCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_product_countries AS
            (
                SELECT
                    product_countries.id,
                    product_countries.product_id,
                    countries.name as country_id,
                    product_countries.created_at

                FROM `product_countries`
                    JOIN countries ON countries.id = product_countries.country_id
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
        DB::statement('DROP VIEW IF EXISTS view_product_countries');
    }
}
