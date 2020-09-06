<?php

namespace App\Http\Livewire;

use App\Car;
use App\Customer;
use Livewire\Component;

class CheckPrice extends Component
{

    public $car;
    public $servicesType;
    public $estimatedPrice;
    public $duration;

    public function render()
    {
        $customers = Customer::all();
        $cars = Car::all();

        return view('livewire.check-price')->with([
            'customers'     => $customers,
            'cars'          => $cars
        ]);
    }

    public function checkPrice()
    {
        $this->validate([
            'car'           => 'required',
            'servicesType'  => 'required',
            'duration'      => 'required'
        ]);

        $car = Car::findOrFail($this->car);
        $tipe_price = ($this->servicesType == 3 ? 200000 : ($this->servicesType == 2 ? 100000 : 0));
        $this->estimatedPrice = (intval($car->price) + $tipe_price) * intval($this->duration);
    }
}
