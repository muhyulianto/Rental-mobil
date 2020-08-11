<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Armada extends Model
{
    protected $fillable = [
        'car_id', 'license_plate'
    ];
    
    /**
     * 
     * RELATIONSHIP
     * 
     */
    public function cars() {
        return $this->hasOne('App\Car', 'id', 'car_id');
    }
    
    /**
     * 
     * MUTATOR
     *
     */
    public function getFormatNameAttribute() {
        return $this->cars->brand." ".$this->cars->name;
    }
}
