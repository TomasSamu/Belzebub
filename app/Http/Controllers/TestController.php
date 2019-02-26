<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoardGame;
use App\Location;
class TestController extends Controller
{
    public function test()
    {
        $location = Location::find(1);
        return view('test',compact('location'));
    }

}
