<?php

use Illuminate\Database\Seeder;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('product_types')->truncate();

		DB::table('product_types')->insert([
			'name' => 'Renta'
		]);

		DB::table('product_types')->insert([
			'name' => 'Venta'
		]);
    }
}
