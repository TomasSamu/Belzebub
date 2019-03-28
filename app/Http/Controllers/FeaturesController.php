<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\BoardGame;
use App\User;
use App\Event;
use App\Offer;
use App\Genre;

class FeaturesController extends Controller
{
    public function addGameToCollection($id)
    {
        $game = BoardGame::find($id);
        $user = User::find(Auth::id());
        if($user->boardgames()->where('board_game_id', $game->id)->exists()) {
            return back();
        } else {

            $user->boardgames()->attach($game->id);
            return back();
        }
        
    }

    public function removeGameFromCollection($id)
    {
        $game = BoardGame::find($id);
        $user = User::find(Auth::id());
        $user->boardgames()->detach($game->id);
        return back();
    }
    public function removeGenreFromCollection($id)
    {
        $genre = Genre::find($id);
        $user = User::find(Auth::id());
        $user->genres()->detach($genre->id);
        return back();
    }
    public function offersIndex()
    {
        $offers = Offer::paginate(6);
        $list = view('offers.index', compact('offers'));

        return $list;
    }
    public function offersShow($id)
    {
        $offer = Offer::find($id);
        $detail = view('offers.show',compact('offer'));
        return $detail;
    }

    public function createOffer($id, Request $request)
    {
        $game = BoardGame::find($id);
        $user = User::find(Auth::id());

            $offer = new Offer;
            $offer->user_id = $user->id;
            $offer->boardgame_id = $game->id;
            $offer->title =$user->name .  " has put " . $game->name . " up for trade";
            $offer->text = "";
            
            $offer->save();
    
            return back()->with('success','you have successfully put a game up for trade: '.$game->name);
    }
        

    public function attendEvent($id)
    {

        $event = Event::find($id);
        $user = User::find(Auth::id());

        if ($user->attend_events()->where('event_id', $event->id)->exists()){
            return redirect(action('EventController@index'))->with('warning', 'You already confirmed attendance at '.$event->title);;
        } else {
            $user->attend_events()->attach($event->id);
            return redirect(action('EventController@index'))->with('success', 'You are attending '.$event->title);
        }
    }

    public function unattendEvent($id)
    {

    $event = Event::find($id);
    $user = User::find(Auth::id());


    $user->attend_events()->where('event_id',$event->id)->detach($event->id);
    return redirect(action('UserController@show', Auth::id()))->with('warning', 'You have just unattended event: '.$event->title);;

    }

}

