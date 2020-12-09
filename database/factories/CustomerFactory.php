<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'father_name' => $faker->name,
        'grand_father_name' => $faker->name,
        'customer_number' => $faker->numberBetween($min = 10, $max = 9000000),
        'gender' => $faker->randomElement($array = array ('male','female')),
        'customer_address' => $faker->city,
        'customer_type' => $faker->randomElement($array = array ('private','dalit')),
        'mobile_number' => $faker->e164PhoneNumber,
        'meter_serial' => $faker->numberBetween($min = 10, $max = 4000000),
        'meter_connected_date' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
        'meter_initial_reading' => $faker->numberBetween($min = 10, $max = 10000),
        'meter_reading_zone' => $faker->numberBetween($min = 1, $max = 10),
        'ward' => $faker->numberBetween($min = 1, $max = 10),
        'tap_type' => $faker->randomElement($array = array ('temporary','permanent')),
        'tap_size' => $faker->numberBetween($min = 0.5, $max = 2.5),
        'number_of_consumers' => $faker->numberBetween($min = 1, $max = 20),
    ];
});
