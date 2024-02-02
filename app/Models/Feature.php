<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public function room()
    {
        return $this->belongsTo('App\Model\Room');
    }
}
