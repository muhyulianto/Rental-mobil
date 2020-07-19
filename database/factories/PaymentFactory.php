<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rent;
use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {

    $id_peminjaman = Rent::where('status', 'kembali')->get()->random()->id;
    $id_user = Rent::where('id', $id_peminjaman)->value('id_user');
    $total_pembayaran = Rent::where('id', $id_peminjaman)->first()->total_harga;
    $uang_pembayaran = $faker->numberBetween($min = $total_pembayaran, $max = $total_pembayaran + 10000);
    $denda = Rent::where('id', $id_peminjaman)->first()->total_denda;

    return [
        'id_user'           => $id_user,
        'id_peminjaman'     => $id_peminjaman,
        'total_pembayaran'  => $total_pembayaran,
        'uang_pembayaran'   => $uang_pembayaran,
        'uang_kembalian'    => $uang_pembayaran - $total_pembayaran,
        'denda'             => $denda
    ];
});
