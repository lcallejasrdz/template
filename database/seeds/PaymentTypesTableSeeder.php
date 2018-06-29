<?php

use Illuminate\Database\Seeder;

class PaymentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('payment_types')->truncate();

		DB::table('payment_types')->insert([
			'name' => 'PayPal'
		]);

		DB::table('payment_types')->insert([
			'name' => 'Pago con Tarjeta'
		]);
    }
}
