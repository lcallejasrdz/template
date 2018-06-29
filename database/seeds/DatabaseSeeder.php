<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusTableSeeder::class);
        $this->call(SaleStatusesTableSeeder::class);
        $this->call(GendersTableSeeder::class);
        $this->call(PersonTypesTableSeeder::class);
        $this->call(EventTypesTableSeeder::class);
        $this->call(ProductTypesTableSeeder::class);
        $this->call(ProductUnitiesTableSeeder::class);
        $this->call(PreparationTimesTableSeeder::class);
        $this->call(RestockedTimesTableSeeder::class);
        $this->call(PercentBuysTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubcategoriesTableSeeder::class);
        $this->call(ProductModulesTableSeeder::class);
        $this->call(PaymentTypesTableSeeder::class);
        $this->call(MembershipsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
