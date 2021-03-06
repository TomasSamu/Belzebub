<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function boardgames()
    {
        return $this->belongsToMany('App\BoardGame');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function attend_events()
    {
        return $this->belongsToMany('App\Event', 'event_user', 'attendee_id', 'event_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function offers()
    {
        return $this->hasMany('App\Offer');
    }
}
