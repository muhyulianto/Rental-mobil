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

    public function getFormatAgeAttribute()
    {
        if (($this->age / 10) % 10 != 1) {
            switch ($this->age % 10) {
                case 1:
                    return $this->age . "st";
                case 2:
                    return $this->age . "nd";
                case 3:
                    return $this->age . "rd";
            }
        }
        return $this->age . "th";
    }
}
