<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Boardgame;
use App\Genre;
use App\Event;

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

<<<<<<< HEAD
    public function boardgames()
    {
        $this->belongsToMany('Boardgame');
=======

    public function genres()
    {
        return $this->belongsToMany('Genre');
    }

    public function events()
    {
        return $this->belongsToMany('Event');
>>>>>>> 14e4bf99f630c87eb3908da14a41f3b9aa3967dc
    }
}
