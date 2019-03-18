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
        return $this->belongsTo('App\Boardgame');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
