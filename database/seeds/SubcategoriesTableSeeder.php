<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('subcategories')->truncate();

		DB::table('subcategories')->insert([
			'category_id' => 1,
			'name' => 'Mariachi'
		]);
    }
}
