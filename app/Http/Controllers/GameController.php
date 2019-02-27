<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Boardgame;

class GameController extends Controller
{
    public function list()
    {
        $games = Boardgame::paginate(6);
        $list = view('games.list_of_games', compact('games'));

        return $list;
    }
    public function detail($id)
    {
        $game = Boardgame::find($id);
        $detail = view('games.detail',compact('game'));
        return $detail;
    }
}
