<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'title',
        'text',
        'num_of_players',
        'user_id',
        'location_id',
        'date',
        'time'
    ];
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    public function boardgames()
    {
        return $this->belongsToMany('App\BoardGame');
    }

    public function attendees()
    {
        return $this->belongsToMany('App\User','event_user','event_id', 'attendee_id');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function mainComments()
    {
        return $this->comments()->whereNull('comment_id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }
    

    
}
