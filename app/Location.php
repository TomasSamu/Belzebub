<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        "name",
        "description",
        "street",
        "zip_code",
        "city",
        "country",
        "web",
        "image",
        "rating",
    ];
    
    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }


}
