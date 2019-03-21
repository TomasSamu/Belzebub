<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function offer()
    {
        return $this->belongsTo('App\Offer');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function replies()
    {
        return $this->hasMany('App\Comment', 'comment_id');
    }

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
