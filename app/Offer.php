<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Boardgame;
use App\Comment;
class Offer extends Model
{
    public function boardgames()
    {
        return $this->hasMany('Boardgame');
    }
    public function comments()
    {
        return $this->hasMany('Comment');
    }
}
