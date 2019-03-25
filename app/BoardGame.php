<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardGame extends Model
{

    protected $fillable = [
        "name",
        "play_time",
        "age_range",
        "min_players",
        "max_players",
        "image",
        "year",
        "image_url",
        "description",
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
    public function offers()
    {
        return $this->hasMany('App\Offer');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function mainComments()
    {
        return $this->comments()->whereNull('comment_id');
    }
}
