<?php

use Illuminate\Database\Seeder;

class PersonTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('person_types')->truncate();

		DB::table('person_types')->insert([
			'name' => 'Persona Moral'
		]);

		DB::table('person_types')->insert([
			'name' => 'Persona Física'
		]);
    }
}
