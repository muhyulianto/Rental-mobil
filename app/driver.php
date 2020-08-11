<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'age', 'address', 'phone_number'
    ];

    public function getFormatAgeAttribute() {
        return $this->age." Tahun";
    }
}
