<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function hotel()
    {
        return $this->belongsTo('App\Model\Hotel');
    }

    public function bookings()
    {
        return $this->hasMany('App\Model\Booking');
    }

    public function features()
    {
        return $this->hasMany('App\Model\Feature');
    }
}
