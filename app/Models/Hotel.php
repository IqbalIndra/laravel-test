<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    public function rooms()
    {
        return $this->hasMany('App\Model\Room');
    }

    public function reviews()
    {
        return $this->hasMany('App\Model\Review');
    }
}
