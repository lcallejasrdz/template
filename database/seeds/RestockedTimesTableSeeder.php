<?php

use Illuminate\Database\Seeder;

class RestockedTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('restocked_times')->truncate();

		DB::table('restocked_times')->insert([
			'name' => '12 horas',
			'hours' => '12'
		]);

		DB::table('restocked_times')->insert([
			'name' => '24 horas',
			'hours' => '24'
		]);

		DB::table('restocked_times')->insert([
			'name' => '48 horas',
			'hours' => '48'
		]);

		DB::table('restocked_times')->insert([
			'name' => '72 horas',
			'hours' => '72'
		]);

		DB::table('restocked_times')->insert([
			'name' => '1 semana',
			'hours' => '168'
		]);
    }
}
