<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    public function boardgames()
    {
        return $this->belongsToMany('App\BoardGame');
    }
}
