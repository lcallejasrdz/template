<?php

use Illuminate\Database\Seeder;

class MembershipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('memberships')->truncate();

		DB::table('memberships')->insert([
			'name' => 'Membresía UNO',
			'quantity' => 1000,
			'monthly_cost' => 500,
			'annual_cost' => 5000
		]);
    }
}
