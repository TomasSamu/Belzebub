<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Boardgame;
use App\User;
class FeaturesController extends Controller
{
    public function addGameToCollection($id)
    {
        $game = Boardgame::find($id);
        $user = User::find(Auth::id());
        if($user->boardgames()->where('board_game_id', $game->id)->exists()) {
            return back();
        } else {

            $user->boardgames()->attach($game->id);
            return back();
        }
        
    }

}
