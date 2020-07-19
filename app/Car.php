<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jenis_mobil', 'nama_mobil', 'merk_mobil', 'bahan_bakar', 'harga'
    ];
    
    /**
     * 
     * RELATIONSHIP
     *
     */
    public function armadas() {
        return $this->hasMany('App\Armada', 'id_mobil', 'id');
    }
    
    /**
     * 
     * MUTATOR
     * 
     */
    public function getFormatHargaAttribute() {
        return "Rp.".$this->harga.",-";
    }

    public function getFormatJumlahArmadaAttribute() {
        $jumlah_armada = $this->armadas_count;
        $cek_jumlah_armada = ($jumlah_armada == 0 ? ' Kosong' : $jumlah_armada.' Unit');
        return $cek_jumlah_armada;
    }

    public function getNamaLengkapMobilAttribute() {
        return "{$this->merk_mobil} {$this->nama_mobil}";
    }
}
