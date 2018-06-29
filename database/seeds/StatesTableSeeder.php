<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('states')->truncate();

		DB::table('states')->insert([
			'country_id' => 1,
			'name' => 'Estado de México'
		]);
    }
}
