<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    protected $fillable = [
        'id_mobil', 'nomor_plat'
    ];
    
    /**
     * 
     * RELATIONSHIP
     * 
     */
    public function cars() {
        return $this->hasOne('App\Car', 'id', 'id_mobil');
    }
    
    /**
     * 
     * MUTATOR
     *
     */
    public function getFormatNamaMobilAttribute() {
        return $this->cars->merk_mobil." ".$this->cars->nama_mobil;
    }
}
