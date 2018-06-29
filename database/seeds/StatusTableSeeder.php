<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('statuses')->truncate();

		DB::table('statuses')->insert([
			'name' => 'Activo'
		]);

		DB::table('statuses')->insert([
			'name' => 'Inactivo'
		]);

		DB::table('statuses')->insert([
			'name' => 'En Revisión'
		]);
    }
}
