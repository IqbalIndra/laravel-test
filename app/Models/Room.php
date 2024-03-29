<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel');
    }

    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function features()
    {
        return $this->hasMany('App\Models\Feature');
    }
}
