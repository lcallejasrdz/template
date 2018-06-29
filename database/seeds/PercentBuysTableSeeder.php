<?php

use Illuminate\Database\Seeder;

class PercentBuysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('percent_buys')->truncate();

		DB::table('percent_buys')->insert([
			'name' => '10%',
			'percent' => '10'
		]);

		DB::table('percent_buys')->insert([
			'name' => '20%',
			'percent' => '20'
		]);

		DB::table('percent_buys')->insert([
			'name' => '30%',
			'percent' => '30'
		]);

		DB::table('percent_buys')->insert([
			'name' => '40%',
			'percent' => '40'
		]);

		DB::table('percent_buys')->insert([
			'name' => '50%',
			'percent' => '50'
		]);

		DB::table('percent_buys')->insert([
			'name' => '60%',
			'percent' => '60'
		]);

		DB::table('percent_buys')->insert([
			'name' => '70%',
			'percent' => '70'
		]);

		DB::table('percent_buys')->insert([
			'name' => '80%',
			'percent' => '80'
		]);

		DB::table('percent_buys')->insert([
			'name' => '90%',
			'percent' => '90'
		]);
    }
}
