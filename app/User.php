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
        return $this->belongsToMany('App\Boardgame');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function events()
    {
        return $this->belongsToMany('App\Event');
    }

    public function events_created_by()
    {
        return $this->hasMany('App\Event');
    }
}
