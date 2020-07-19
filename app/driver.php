<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'driver_name', 'driver_age', 'driver_address', 'driver_phone'
    ];

    public function getFormatDriverAgeAttribute() {
        return $this->driver_age." Tahun";
    }
}
