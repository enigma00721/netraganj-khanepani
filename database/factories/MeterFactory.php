<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Meter;
use App\Customer;
use Faker\Generator as Faker;

$factory->define(Meter::class, function (Faker $faker) use ($factory) {


    return [
        'meter_serial' => $faker->numberBetween($min = 10, $max = 4000000),
        'meter_connected_date' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now'),
        'meter_initial_reading' => $faker->numberBetween($min = 10, $max = 10000),
        'meter_reading_zone' => $faker->numberBetween($min = 1, $max = 6),
        'ward' => $faker->numberBetween($min = 1, $max = 6),
        'tap_type' => $faker->randomElement($array = array ('temporary','permanent')),
        'tap_size' => $faker->randomElement($array = array ('1','0.5')),
        'number_of_consumers' => $faker->numberBetween($min = 1, $max = 20),
        'meter_status' => $faker->numberBetween($min = 0, $max = 1),
       
        'customer_id' => function () {
            return factory(App\Customer::class)->create()->id;
        },
        //  'customer_id' => $faker->unique()->randomElement(App\Customer::take(500)->orderBy('id')->pluck('id'))
    ];
});
