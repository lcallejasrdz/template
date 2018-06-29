<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_sales AS
            (
                SELECT
                    sales.id,
                    CONCAT(users.first_name, ' ', users.last_name) as user_id,
                    payment_types.name as payment_type_id,
                    sales.total,
                    countries.name as country_id,
                    states.name as state_id,
                    cities.name as city_id,
                    sales.municipality,
                    sales.colony,
                    sales.street,
                    sales.no_ext,
                    sales.no_int,
                    sales.postal_code,
                    sales.created_at

                FROM `sales`
                    JOIN users ON users.id = sales.user_id
                    JOIN payment_types ON payment_types.id = sales.payment_type_id
                    JOIN countries ON countries.id = sales.country_id
                    JOIN states ON states.id = sales.state_id
                    JOIN cities ON cities.id = sales.city_id

                WHERE sales.deleted_at IS NULL
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
        DB::statement('DROP VIEW IF EXISTS view_sales');
    }
}
