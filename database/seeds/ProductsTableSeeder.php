<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str as Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('products')->truncate();

		// Products
		for($i=1; $i<=18; $i++){
			if($i <= 9){
				$user_id = 5;
			}else{
				$user_id = 6;
			}
			DB::table('products')->insert([
		        'product_module_id' => 1,
		        'user_id' => $user_id,
		        'category_id' => 1,
		        'subcategory_id' => 1,
		        'name' => 'Producto '.$i,
		        'slug' => Str::slug('Producto '.$i),
		        'description' => '<p>Descripción del producto '.$i.'</p>',
		        'price' => 2500,
		        'percent_buy_id' => null,
		        'product_unity_id' => 1,
		        'img_1' => 'bKibAI0ZSphF7dhxfRBuvnpdf00adxECTZfkSDNO.jpeg',
		        'img_2' => '',
		        'img_3' => '',
		        'img_4' => '',
		        'img_5' => '',
		        'product_type_id' => 2,
		        'inventory' => 500,
		        'min_buy' => 10,
		        'preparation_time_id' => 1,
		        'restocked_time_id' => 1,
		        'monday_init' => '07:00',
		        'monday_finish' => '23:30',
		        'tuesday_init' => '',
		        'tuesday_finish' => '',
		        'wednesday_init' => '',
		        'wednesday_finish' => '',
		        'thursday_init' => '',
		        'thursday_finish' => '',
		        'friday_init' => '',
		        'friday_finish' => '',
		        'saturday_init' => '',
		        'saturday_finish' => '',
		        'sunday_init' => '',
		        'sunday_finish' => '',
		        'status_id' => 1,
			]);

			for($j=1; $j<=4; $j++){
				DB::table('product_event_types')->insert([
			        'product_id' => $i,
			        'event_type_id' => $j,
				]);
			}

			DB::table('product_countries')->insert([
		        'product_id' => $i,
		        'country_id' => 1,
			]);

			DB::table('product_states')->insert([
		        'product_id' => $i,
		        'state_id' => 1,
			]);

			DB::table('product_cities')->insert([
		        'product_id' => $i,
		        'city_id' => 1,
			]);
		}

		// Services
		for($i=19; $i<=36; $i++){
			if($i <= 27){
				$user_id = 5;
			}else{
				$user_id = 6;
			}
			DB::table('products')->insert([
		        'product_module_id' => 2,
		        'user_id' => $user_id,
		        'category_id' => 1,
		        'subcategory_id' => 1,
		        'name' => 'Servicio '.$i,
		        'slug' => Str::slug('Servicio '.$i),
		        'description' => '<p>Descripción del servicio '.$i.'</p>',
		        'price' => 2500,
		        'percent_buy_id' => null,
		        'product_unity_id' => 1,
		        'img_1' => 'NntoOZo573EHdPquVWTVy3I73ikWKXc1zpqgqbVC.jpg',
		        'img_2' => '',
		        'img_3' => '',
		        'img_4' => '',
		        'img_5' => '',
		        'address' => '',
		        'lat' => '',
		        'lng' => '',
		        'min_buy' => 5,
		        'max_buy' => 10,
		        'capacity' => 2,
		        'preparation_time_id' => 1,
		        'duration' => 3,
		        'monday_init' => '07:00',
		        'monday_finish' => '23:30',
		        'tuesday_init' => '',
		        'tuesday_finish' => '',
		        'wednesday_init' => '',
		        'wednesday_finish' => '',
		        'thursday_init' => '',
		        'thursday_finish' => '',
		        'friday_init' => '',
		        'friday_finish' => '',
		        'saturday_init' => '',
		        'saturday_finish' => '',
		        'sunday_init' => '',
		        'sunday_finish' => '',
		        'status_id' => 1,
			]);

			for($j=1; $j<=4; $j++){
				DB::table('product_event_types')->insert([
			        'product_id' => $i,
			        'event_type_id' => $j,
				]);
			}

			DB::table('product_countries')->insert([
		        'product_id' => $i,
		        'country_id' => 1,
			]);

			DB::table('product_states')->insert([
		        'product_id' => $i,
		        'state_id' => 1,
			]);

			DB::table('product_cities')->insert([
		        'product_id' => $i,
		        'city_id' => 1,
			]);
		}
    }
}
