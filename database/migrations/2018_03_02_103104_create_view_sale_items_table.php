<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewSaleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_sale_items AS
            (
                SELECT
                    sale_items.id,
                    sale_items.sale_id,
                    products.name as product_id,
                    sale_items.price,
                    sale_items.quantity,
                    sale_items.token,
                    sale_statuses.name as sale_status_id,
                    sale_items.created_at

                FROM `sale_items`
                    JOIN products ON products.id = sale_items.product_id
                    JOIN sale_statuses ON sale_statuses.id = sale_items.sale_status_id
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
        DB::statement('DROP VIEW IF EXISTS view_sale_items');
    }
}
