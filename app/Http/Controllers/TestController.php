<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoardGame;
class TestController extends Controller
{
    public function test()
    {
        $boardgame = BoardGame::find(1);
        $test = view('test',compact('boardgame'));
        return $test;
    }

}
