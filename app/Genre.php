<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Genre extends Model
{
    public function boardgames()
    {
        return $this->belongsToMany('App\BoardGame');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
