<?php

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('countries')->truncate();

		DB::table('countries')->insert([
			'name' => 'México'
		]);
    }
}
