<?php

namespace App;

use App\Rent;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $fillable = [
        'nomor_tagihan'
    ];

    public function rents() {
        return $this->hasOne('App\Rent', 'id', 'id_peminjaman');
    }

    public function customers() {
        return $this->hasOne('App\Customer', 'id', 'id_customer');
    }

    public function getFormatTotalHargaAttribute() {
        return "Rp.{$this->total_harga},-";
    }

}
