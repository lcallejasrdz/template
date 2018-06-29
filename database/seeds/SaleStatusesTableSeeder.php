<?php

use Illuminate\Database\Seeder;

class SaleStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('sale_statuses')->truncate();

		DB::table('sale_statuses')->insert([
			'name' => 'Pedido'
		]);

		DB::table('sale_statuses')->insert([
			'name' => 'Preparando'
		]);

		DB::table('sale_statuses')->insert([
			'name' => 'Enviado'
		]);

		DB::table('sale_statuses')->insert([
			'name' => 'Recibido'
		]);

		DB::table('sale_statuses')->insert([
			'name' => 'Cancelado'
		]);
    }
}
