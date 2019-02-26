<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Genre;
use App\Event;
use App\Offer;

class BoardGame extends Model
{

    protected $fillable = [
        "name",
        "play_time",
        "age_range",
        "min_players",
        "max_players",
        "image"
    ];

    public function users()
    {

        return $this->belongsToMany('User');
    }

    public function genres()
    {
        return $this->belongsToMany('Genre');
    }

    public function events()
    {
        return $this->belongsToMany('Event');
    }   
    public function offer()
    {
        return $this->belongsTo('Offer');
    }
}
