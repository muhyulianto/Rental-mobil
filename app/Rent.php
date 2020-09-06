<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rent extends Model
{
    protected $fillable = [
        'customer_id', 'car_id', 'services_type', 'start_date', 'duration', 'pickup_location'
    ];

    /**
     * 
     * RELATIONSHIP
     *
     */
    public function customers()
    {
        return $this->hasOne('App\Customer', 'id', 'customer_id');
    }

    public function cars()
    {
        return $this->hasOne('App\Car', 'id', 'car_id');
    }

    public function drivers()
    {
        return $this->hasOne('App\Driver', 'id', 'driver_id');
    }

    public function armadas()
    {
        return $this->hasOne('App\Armada', 'id', 'id_armada');
    }


    /**
     * 
     * MUTATOR
     *
     */
    public function getFormatStartDateAttribute()
    {
        return Carbon::parse($this->start_date)->format('j F Y');
    }

    public function getFormatDurationAttribute()
    {
        return $this->duration . " Days";
    }

    public function getFormatEndDateAttribute()
    {
        return Carbon::parse($this->end_date)->format('j F Y');
    }

    public function getFormatServicesTypeAttribute()
    {
        $text = ($this->services_type == 3 ? 'Car, Driver and Fuel' : ($this->services_type == 2 ? 'Car and Driver' : 'Car'));
        return $text;
    }

    public function getCarFullNameAttribute()
    {
        return "{$this->cars->brand} {$this->cars->name}";
    }

    public function getLokasiGambarMobilAttribute()
    {
        return "images/{$this->cars->image}";
    }

    public function getLokasiGambarUserAttribute()
    {
        return "images/{$this->users->profile}";
    }

    public function getCarPriceAttribute()
    {
        return $this->cars->price * $this->duration;
    }

    public function getFormatCarPriceAttribute()
    {
        return "Rp." . $this->car_price . ",-";
    }

    public function getDriverPriceAttribute()
    {
        if ($this->services_type == 2 || $this->services_type == 3) {
            $price_driver = $this->duration * 100000;
            return $price_driver;
        }

        return 0;
    }

    public function getFormatDriverPriceAttribute()
    {
        if ($this->driver_price != 0) {
            return "Rp.{$this->driver_price},-";
        }

        return "-";
    }

    public function getFuelPriceAttribute()
    {
        if ($this->services_type == 3) {
            $fuel_price = $this->duration * 100000;
            return $fuel_price;
        }

        return 0;
    }

    public function getFormatFuelPriceAttribute()
    {
        if ($this->fuel_price != 0) {
            return "Rp.{$this->fuel_price},-";
        }

        return "-";
    }

    public function getTotalPriceAttribute()
    {
        $price = $this->car_price + $this->dirver_price + $this->fuel_price;
        return $price;
    }

    public function getFormatTotalPriceAttribute()
    {
        return "Rp." . $this->total_price . ",-";
    }
}
