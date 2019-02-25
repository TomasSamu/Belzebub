<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoardGame;
use App\Collection;
class TestController extends Controller
{
    public function test()
    {
        $collection = Collection::find(2);
        $test = view('test',compact('collection'));
        return $test;
    }

}
