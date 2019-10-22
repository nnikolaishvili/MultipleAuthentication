<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Flight;
use Faker\Generator as Faker;

$factory->define(Flight::class, function (Faker $faker) {
    return [
        'company' => $faker->company,
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
        'days' => $faker->randomDigit,
        'total_cost' => $faker->randomFloat()
    ];
});
