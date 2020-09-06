<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rent;
use App\Car;
use App\Customer;
use Carbon\Carbon;

use Faker\Generator as Faker;

$factory->define(Rent::class, function (Faker $faker) {

    $car_id = Car::all()->random()->id;
    $mobil = Car::where('id', $car_id)->first();
    $services_type = $faker->numberBetween($min = 1, $max = 3);
    $start_date = $faker->dateTimeBetween($startDate = '-3 days', $endDate = 'now', $timezone = null);
    $duration = $faker->numberBetween($min = 1, $max = 7);

    return [
        'customer_id'           => Customer::all()->random()->id,
        'car_id'              => $car_id,
        'services_type'       => $services_type,
        'start_date'            => $start_date,
        'duration'             => $duration,
        'end_date'            => Carbon::parse($start_date)->addDay($duration),
        'pickup_location'    => ($services_type == 1 ? '-' : $faker->address),
        'status'                => 'pending',
    ];
});
