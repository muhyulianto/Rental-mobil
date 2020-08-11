<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rent;
use App\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {

    $rent_id = Rent::where('status', 'completed')->get()->random()->id;
    $user_id = Rent::where('id', $rent_id)->value('user_id');
    $total_pembayaran = Rent::where('id', $rent_id)->first()->total_price;
    $uang_pembayaran = $faker->numberBetween($min = $total_pembayaran, $max = $total_pembayaran + 10000);
    $denda = Rent::where('id', $rent_id)->first()->total_denda;

    return [
        'user_id'           => $user_id,
        'rent_id'     => $rent_id,
        'total_pembayaran'  => $total_pembayaran,
        'uang_pembayaran'   => $uang_pembayaran,
        'uang_kembalian'    => $uang_pembayaran - $total_pembayaran,
        'denda'             => $denda
    ];
});
