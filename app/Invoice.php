<?php

namespace App;

use App\Rent;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $fillable = [
        'invoice_number'
    ];

    public function rents() {
        return $this->hasOne('App\Rent', 'id', 'rent_id');
    }

    public function customers() {
        return $this->hasOne('App\Customer', 'id', 'customer_id');
    }

    public function getFormatTotalPriceAttribute() {
        return "Rp.{$this->total_price},-";
    }

}
