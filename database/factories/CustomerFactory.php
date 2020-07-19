<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {

    $faker->addProvider(new \Faker\Provider\id_ID\Person($faker));

    return [
        'nomor_ktp'     => $faker->nik(),
        'nama'          => $faker->name,
        'nomor_telepon' => '+628' . $faker->randomNumber($nbDigits = 9, $strict = false),
        'alamat'        => $faker->address
    ];
});
