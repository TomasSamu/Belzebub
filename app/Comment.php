<?php

namespace App;
use App\Offer;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function offer()
    {
        return $this->belongsTo('Offer');
    }
    public function comments()
    {
        return $this->hasMany('Comment');
    }
    public function comment()
    {
        return $this->belongsTo('Comment');
    }
}
