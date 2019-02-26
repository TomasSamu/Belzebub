<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Boardgame;
use App\Location;

class Event extends Model
{
    public function users()
    {
        return $this->belongsToMany('User');
    }
    public function boardgames()
    {
        return $this->belongsToMany('Boardgame');
<<<<<<< HEAD
    }

    public function created_by_user()
    {
        return $this->belongsTo('User');
    }

    public function location()
    {
        return $this->belongsTo('Location');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
=======
>>>>>>> a1cb654feea358c9d2560f91db5196bf6171dfff
    }
    
}
