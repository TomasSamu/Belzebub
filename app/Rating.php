<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function boardgame()
    {
        return $this->belongsTo('App\BoardGame');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
