<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Offer extends Model
{
    protected $fillable = [
        "title",
        "text",
        "user_id",
        "board_game_id"

    ];
    public function boardgame()
    {
        return $this->belongsTo('App\BoardGame');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
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
