<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function boardgames()
    {
        return $this->belongsToMany('App\Boardgame');
    }

    public function created_by_user()
    {
        return $this->belongsTo('App\User');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    

    
}
