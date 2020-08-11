<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Car;
use App\Armada;
use App\Rent;
use App\Driver;
use App\Invoice;
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
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'is_admin' => '1',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'user@test.com',
                'is_admin' => '0',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

        $car = [
            [
                'type'   => 'MPV',
                'name'    => 'Avanza',
                'brand'    => 'Toyota',
                'price'         => '200000',
                'fuel'   => 'Pertalite',
                'image'        => 'avanza.jpg'
            ],
            [
                'type'   => 'Sedan',
                'name'    => 'Camry',
                'brand'    => 'Toyota',
                'price'         => '1000000',
                'fuel'   => 'Pertamax',
                'image'        => 'camry.png'
            ],
            [
                'type'   => 'SUV',
                'name'    => 'Terrios',
                'brand'    => 'Daihatsu',
                'price'         => '500000',
                'fuel'   => 'Premium',
                'image'        => 'terios.png'
            ]
        ];

        foreach ($car as $key => $value) {
            Car::create($value);
        }

        $armada = [
            [
                'car_id'      => 1,
                'license_plate'    => 'AD12345CD',
                'status'        => 'available'
            ],
            [
                'car_id'      => 2,
                'license_plate'    => 'AD23454DE',
                'status'        => 'available'
            ],
            [
                'car_id'      => 3,
                'license_plate'    => 'AD23474DE',
                'status'        => 'available'
            ]
        ];

        foreach ($armada as $key => $value) {
            Armada::create($value);
        }

        $driver = [
            [
                "name"   => "Sukijo",
                "age"    => 32,
                "address" => "Tawangmangu",
                "phone_number"  => "085221223223"
            ],
            [
                "name"   => "Sukijan",
                "age"    => 42,
                "address" => "Karanganyar",
                "phone_number"  => "085221223224"
            ],
            [
                "name"   => "Suparman",
                "age"    => 35,
                "address" => "Matesih",
                "phone_number"  => "085221223225"
            ]
        ];

        foreach ($driver as $key => $value) {
            Driver::create($value);
        }

        factory(Customer::class, 15)->create();
        factory(Rent::class, 5)->create();
    }
}
