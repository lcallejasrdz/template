<?php

use Illuminate\Database\Seeder;

class EventTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('event_types')->truncate();

		DB::table('event_types')->insert([
			'name' => 'Cumpleaños'
		]);

		DB::table('event_types')->insert([
			'name' => 'Boda'
		]);

		DB::table('event_types')->insert([
			'name' => 'Concierto'
		]);

		DB::table('event_types')->insert([
			'name' => 'Graduación'
		]);
    }
}
