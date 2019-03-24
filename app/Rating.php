<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}
