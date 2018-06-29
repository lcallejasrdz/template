<?php

use Illuminate\Database\Seeder;

class ProductUnitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('product_unities')->truncate();

		DB::table('product_unities')->insert([
			'name' => 'Pieza'
		]);

		DB::table('product_unities')->insert([
			'name' => 'Persona'
		]);

		DB::table('product_unities')->insert([
			'name' => 'Paquete'
		]);

		DB::table('product_unities')->insert([
			'name' => 'Servicio'
		]);
    }
}
