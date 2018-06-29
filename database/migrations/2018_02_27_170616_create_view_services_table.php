<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_services AS
            (
                SELECT
                    products.id,
                    product_modules.name as product_module_id,
                    users.commercial_name as user_id,
                    categories.name as category_id,
                    subcategories.name as subcategory_id,
                    products.name,
                    products.slug,
                    products.description,
                    products.price,
                    percent_buys.name as percent_buy_id,
                    product_unities.name as product_unity_id,
                    products.img_1,
                    products.img_2,
                    products.img_3,
                    products.img_4,
                    products.img_5,
                    products.address,
                    products.lat,
                    products.lng,
                    products.min_buy,
                    products.max_buy,
                    products.capacity,
                    preparation_times.name as preparation_time_id,
                    products.duration,
                    products.monday_init,
                    products.monday_finish,
                    products.tuesday_init,
                    products.tuesday_finish,
                    products.wednesday_init,
                    products.wednesday_finish,
                    products.thursday_init,
                    products.thursday_finish,
                    products.friday_init,
                    products.friday_finish,
                    products.saturday_init,
                    products.saturday_finish,
                    products.sunday_init,
                    products.sunday_finish,
                    statuses.name as status_id,
                    products.created_at

                FROM `products`
                    JOIN product_modules ON product_modules.id = products.product_module_id
                    JOIN users ON users.id = products.user_id
                    JOIN categories ON categories.id = products.category_id
                    JOIN subcategories ON subcategories.id = products.subcategory_id
                    LEFT JOIN percent_buys ON percent_buys.id = products.percent_buy_id
                    JOIN product_unities ON product_unities.id = products.product_unity_id
                    JOIN preparation_times ON preparation_times.id = products.preparation_time_id
                    JOIN statuses ON statuses.id = products.status_id

                WHERE products.product_module_id = 2
                    AND products.deleted_at IS NULL
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
        DB::statement('DROP VIEW IF EXISTS view_services');
    }
}
