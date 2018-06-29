<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_module_id');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('description', 1000);
            $table->float('price', 8, 2);
            $table->integer('percent_buy_id')->nullable();
            $table->integer('product_unity_id');
            $table->string('img_1');
            $table->string('img_2')->nullable();
            $table->string('img_3')->nullable();
            $table->string('img_4')->nullable();
            $table->string('img_5')->nullable();
            $table->string('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->integer('product_type_id')->nullable();
            $table->integer('inventory')->nullable();
            $table->integer('min_buy');
            $table->integer('max_buy')->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('preparation_time_id');
            $table->integer('restocked_time_id')->nullable();
            $table->integer('duration')->nullable();
            $table->string('monday_init')->nullable();
            $table->string('monday_finish')->nullable();
            $table->string('tuesday_init')->nullable();
            $table->string('tuesday_finish')->nullable();
            $table->string('wednesday_init')->nullable();
            $table->string('wednesday_finish')->nullable();
            $table->string('thursday_init')->nullable();
            $table->string('thursday_finish')->nullable();
            $table->string('friday_init')->nullable();
            $table->string('friday_finish')->nullable();
            $table->string('saturday_init')->nullable();
            $table->string('saturday_finish')->nullable();
            $table->string('sunday_init')->nullable();
            $table->string('sunday_finish')->nullable();
            $table->integer('status_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
