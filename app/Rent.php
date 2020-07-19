<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Rent extends Model
{
    
    protected $fillable = [
        'id_customer', 'id_mobil', 'id_armada', 'tipe_peminjaman', 'id_driver', 'mulai_sewa', 'lama_sewa', 'habis_sewa', 'lokasi_penjemputan'
    ];
    
    /**
     * 
     * RELATIONSHIP
     *
     */
    public function customers() {
        return $this->hasOne('App\Customer', 'id', 'id_customer');
    }

    public function cars() {
        return $this->hasOne('App\Car', 'id', 'id_mobil');
    }

    public function drivers() {
        return $this->hasOne('App\Driver', 'id', 'id_driver');
    }

    public function armadas() {
        return $this->hasOne('App\Armada', 'id', 'id_armada');
    }

    
    /**
     * 
     * MUTATOR
     *
     */
    public function getFormatMulaiSewaAttribute() {
        return Carbon::parse($this->mulai_sewa)->format('j F Y');
    }

    public function getFormatLamaSewaAttribute() {
        return $this->lama_sewa." Hari";
    }

    public function getFormatHabisSewaAttribute() {
        return Carbon::parse($this->habis_sewa)->format('j F Y');
    }

    public function getFormatTipePeminjamanAttribute() {
        $text = ($this->tipe_peminjaman == 3 ? 'Mobil, Sopir dan Bahan bakar' : ($this->tipe_peminjaman == 2 ? 'Mobil dan Sopir' : 'Hanya mobil'));

        return $text;
    }

    public function getNamaLengkapMobilAttribute() {
        return "{$this->cars->merk_mobil} {$this->cars->nama_mobil}";
    }

    public function getLokasiGambarMobilAttribute() {
        return "images/{$this->cars->gambar}";
    }

    public function getLokasiGambarUserAttribute() {
        return "images/{$this->users->profile}";
    }

    public function getHargaMobilAttribute() {
        return $this->cars->harga * $this->lama_sewa;
    }

    public function getFormatHargaMobilAttribute() {
        return "Rp.".$this->harga_mobil.",-";
    }

    public function getHargaDriverAttribute() {
        if ($this->tipe_peminjaman == 2 || $this->tipe_peminjaman == 3) {
            $harga_driver = $this->lama_sewa * 100000;
            return $harga_driver;
        }

        return 0;
    }

    public function getFormatHargaDriverAttribute() {
        if ($this->harga_driver != 0) {
            return "Rp.{$this->harga_driver},-";
        }

        return "-";
    }

    public function getHargaBahanBakarAttribute() {
        if ($this->tipe_peminjaman == 3) {
            $harga_bahan_bakar = $this->lama_sewa * 100000;
            return $harga_bahan_bakar;
        }

        return 0;
    }

    public function getFormatHargaBahanBakarAttribute() {
        if ($this->harga_bahan_bakar != 0) {
            return "Rp.{$this->harga_bahan_bakar},-";
        }

        return "-";
    }

    public function getTotalHargaAttribute() {
        $harga = $this->harga_mobil + $this->harga_driver + $this->harga_bahan_bakar;
        return $harga;
    }

    public function getFormatTotalHargaAttribute() {
        return "Rp.".$this->total_harga.",-";
    }
}
