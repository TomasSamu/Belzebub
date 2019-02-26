<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Offer extends Model
{
    public function boardgames()
    {
        return $this->hasMany('App\Boardgame');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
