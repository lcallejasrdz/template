<?php

use Illuminate\Database\Seeder;

class PreparationTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('preparation_times')->truncate();

		DB::table('preparation_times')->insert([
			'name' => '12 horas + 12 horas',
			'hours' => '24'
		]);

		DB::table('preparation_times')->insert([
			'name' => '12 horas + 24 horas',
			'hours' => '36'
		]);

		DB::table('preparation_times')->insert([
			'name' => '12 horas + 48 horas',
			'hours' => '60'
		]);

		DB::table('preparation_times')->insert([
			'name' => '12 horas + 72 horas',
			'hours' => '84'
		]);

		DB::table('preparation_times')->insert([
			'name' => '12 horas + 1 semana',
			'hours' => '180'
		]);
    }
}
