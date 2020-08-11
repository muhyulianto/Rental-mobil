<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {

    $faker->addProvider(new \Faker\Provider\id_ID\Person($faker));

    return [
        'id_card_number'    => $faker->nik(),
        'name'              => $faker->name,
        'phone_number'      => '+628' . $faker->randomNumber($nbDigits = 9, $strict = false),
        'address'           => $faker->address
    ];
});
