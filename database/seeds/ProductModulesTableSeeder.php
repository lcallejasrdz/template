<?php

use Illuminate\Database\Seeder;

class ProductModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('product_modules')->truncate();

		DB::table('product_modules')->insert([
			'name' => 'Producto'
		]);

		DB::table('product_modules')->insert([
			'name' => 'Servicio'
		]);
    }
}
