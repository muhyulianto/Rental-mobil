<?php

namespace App;

use File;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'name', 'brand', 'fuel', 'price'
    ];

    /**
     * 
     * RELATIONSHIP
     *
     */
    public function armadas()
    {
        return $this->hasMany('App\Armada', 'car_id', 'id');
    }

    /**
     * 
     * MUTATOR
     * 
     */
    public function setImageNameAttribute()
    {
        $imageName = time() . '.' . File::getClientOriginalExtension();
        $this->attributes['image'] = $imageName;
    }

    public function getFormatPriceAttribute()
    {
        return "Rp." . $this->price . ",-";
    }

    public function getFormatArmadaCountAttribute()
    {
        $jumlah_armada = $this->armadas_count;
        $cek_jumlah_armada = ($jumlah_armada == 0 ? ' Kosong' : $jumlah_armada . ' Unit');
        return $cek_jumlah_armada;
    }

    public function getCarFullNameAttribute()
    {
        return "{$this->brand} {$this->name}";
    }
}
