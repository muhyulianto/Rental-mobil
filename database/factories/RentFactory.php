<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rent;
use App\Car;
use App\Customer;
use App\Driver;
use App\Armada;
use Carbon\Carbon;

use Faker\Generator as Faker;

$factory->define(Rent::class, function (Faker $faker) {
    
    $id_mobil = Car::all()->random()->id;
    $mobil = Car::where('id', $id_mobil)->first();
    $tipe_peminjaman = $faker->numberBetween($min = 1, $max = 3);
    $mulai_sewa = $faker->dateTimeBetween($startDate = '-3 days', $endDate = 'now', $timezone = null);
    $lama_sewa = $faker->numberBetween($min = 1, $max = 7);

    return [
        'id_customer'           => Customer::all()->random()->id,
        'id_mobil'              => $id_mobil,
        'tipe_peminjaman'       => $tipe_peminjaman,
        'mulai_sewa'            => $mulai_sewa,
        'lama_sewa'             => $lama_sewa,
        'habis_sewa'            => Carbon::parse($mulai_sewa)->addDay($lama_sewa),
        'lokasi_penjemputan'    => ($tipe_peminjaman == 1 ? '-' : $faker->address),
        'status'                => 'pending',
    ];

});
