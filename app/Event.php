<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Boardgame;
class Event extends Model
{
    public function users()
    {
        return $this->belongsToMany('User');
    }
    public function boardgames()
    {
        return $this->belongsToMany('Boardgame');
    }
    
}
