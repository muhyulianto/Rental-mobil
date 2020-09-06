<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Driver;
use Faker\Generator as Faker;

$factory->define(Driver::class, function (Faker $faker) {
    return [
        'name'          => $faker->name,
        'age'           => $faker->numberBetween($min = 25, $max = 30),
        'address'       => $faker->address,
        'status'        => 'Available',
        'phone_number'  => '+628' . $faker->randomNumber($nbDigits = 9, $strict = false),
    ];
});
