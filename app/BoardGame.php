<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

        return $this->belongsToMany('App\User');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function events()
    {
        return $this->belongsToMany('App\Event');
    }   
    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }
}
