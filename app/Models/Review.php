<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function hotel()
    {
        return $this->belongsTo('App\Model\Hotel');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
}
