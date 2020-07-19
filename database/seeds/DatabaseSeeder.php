<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Car;
use App\Armada;
use App\Rent;
use App\Driver;
use App\Payment;
use App\Customer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@test.com',
               'is_admin'=>'1',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'user@test.com',
               'is_admin'=>'0',
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

        $car = [
            [
                'jenis_mobil'   => 'MPV',
                'nama_mobil'    => 'Avanza',
                'merk_mobil'    => 'Toyota',
                'harga'         => '200000',
                'bahan_bakar'   => 'Pertalite',
                'gambar'        => 'avanza.jpg'
            ],
            [
                'jenis_mobil'   => 'Sedan',
                'nama_mobil'    => 'Camry',
                'merk_mobil'    => 'Toyota',
                'harga'         => '1000000',
                'bahan_bakar'   => 'Pertamax',
                'gambar'        => 'camry.png'
            ],
            [
                'jenis_mobil'   => 'SUV',
                'nama_mobil'    => 'Terrios',
                'merk_mobil'    => 'Daihatsu',
                'harga'         => '500000',
                'bahan_bakar'   => 'Premium',
                'gambar'        => 'terios.png'
            ]
        ];

        foreach ($car as $key => $value) {
            Car::create($value);
        }

        $armada = [
            [
                'id_mobil'      => 1,
                'nomor_plat'    => 'AD12345CD',
                'status'        => 'tersedia'
            ],
            [
                'id_mobil'      => 2,
                'nomor_plat'    => 'AD23454DE',
                'status'        => 'tersedia'
            ],
            [
                'id_mobil'      => 3,
                'nomor_plat'    => 'AD23474DE',
                'status'        => 'tersedia'
            ]
        ];

        foreach ($armada as $key => $value) {
            Armada::create($value);
        }

        $driver = [
            [
                "driver_name"   => "Sukijo",
                "driver_age"    => 32,
                "driver_address"=> "Tawangmangu",
                "driver_phone"  => "085221223223"
            ],
            [
                "driver_name"   => "Sukijan",
                "driver_age"    => 42,
                "driver_address"=> "Karanganyar",
                "driver_phone"  => "085221223224"
            ],
            [
                "driver_name"   => "Suparman",
                "driver_age"    => 35,
                "driver_address"=> "Matesih",
                "driver_phone"  => "085221223225"
            ]
        ];

        foreach ($driver as $key => $value) {
            Driver::create($value);
        }

        factory(Customer::class, 15)->create();
        factory(Rent::class, 5)->create();
    }
}
