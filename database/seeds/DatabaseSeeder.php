<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Car;
use App\Armada;
use App\Rent;
use App\Driver;
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

        factory(Car::class, 15)->create();
        factory(Armada::class, 30)->create();
        factory(Customer::class, 15)->create();
        factory(Driver::class, 15)->create();
        factory(Rent::class, 15)->create();
    }
}
