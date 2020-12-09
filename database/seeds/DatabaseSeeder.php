<?php

use App\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(CustomerTableSeeder::class);
        factory(App\Customer::class, 870)->create();
    }
}
