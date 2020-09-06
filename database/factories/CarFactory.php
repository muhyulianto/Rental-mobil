<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    $faker->addProvider(new \Faker\Provider\Fakecar($faker));
    $v = $faker->vehicleArray();

    return [
        'type'      => $faker->vehicleType,
        'name'      => $v['model'],
        'brand'     => $v['brand'],
        'fuel'      => $faker->vehicleFuelType,
        'price'     => $faker->randomElement($array = array(200000, 500000, 1000000))
    ];
});
