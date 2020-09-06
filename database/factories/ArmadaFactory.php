<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use App\Armada;
use Faker\Generator as Faker;

$factory->define(Armada::class, function (Faker $faker) {
    return [
        'car_id'        => Car::all()->random()->id,
        'license_plate' => 'AD' . $faker->randomNumber($nbDigits = 4, $strict = false) . Str::random(2),
    ];
});
