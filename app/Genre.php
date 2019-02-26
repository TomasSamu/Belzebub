<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Boardgame;
use App\User;
class Genre extends Model
{
    public function boardgames()
    {
        return $this->belongsToMany('Boardgame');
    }
    public function users()
    {
        return $this->belongsToMany('User');
    }
}
