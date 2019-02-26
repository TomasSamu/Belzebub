<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Genre;
use App\Event;

class BoardGame extends Model
{

    protected $fillable = [
        'name',
        'play_time',
        'age_range',
        'num_of_players',
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
}
