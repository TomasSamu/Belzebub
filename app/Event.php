<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Boardgame;
class Event extends Model
{
    public function users()
    {
        $this->belongsToMany('User');
    }
    public function boardgames()
    {
        $this->belongsToMany('Boardgame');
    }
}
