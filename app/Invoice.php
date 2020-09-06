<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $fillable = [
        'rent_id', 'customer_id', 'invoice_number', 'total_price', 'status'
    ];

    public function rents()
    {
        return $this->hasOne('App\Rent', 'id', 'rent_id');
    }

    public function customers()
    {
        return $this->hasOne('App\Customer', 'id', 'customer_id');
    }

    public function getFormatTotalPriceAttribute()
    {
        return "Rp.{$this->total_price},-";
    }
}
