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

    public function collections()
    {
        return $this->belongsToMany('App\Collection');
    }
}
