<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BoardGame;
use App\Rating;

class BoardGameController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = BoardGame::paginate(20);
        $list = view('games.list_of_games', compact('games'));

        return $list;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = view('games.create');
        return $form;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $game = new BoardGame;

        $validator = $request->validate([
            'name' => 'required',
            'year' => 'required|digits:4',
            'min_players' => 'required|numeric',
            'max_players' => 'required|numeric',
            'age_range' => 'required|numeric',
            'description' => 'required',
            'play_time' => 'required|numeric',
            'image_url' => 'required|url',
        ]); 

        $game->fill($request->only([
            'name',
            'year',
            'min_players',
            'max_players',
            'age_range',
            'description',
            'play_time',
            'image_url', 
        ]));    
        $game->save();

        return redirect(action('BoardGameController@index'))->with('success','you successfully added game: '.$request->name);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $avgRating = round(Rating::where('board_game_id', $id)->avg('rating'), 2);
        $game = BoardGame::find($id);
        $detail = view('games.detail',compact(['game', 'avgRating']));
        return $detail;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $game = BoardGame::find($id);
        $form = view('games.edit',compact('game'));
        return $form;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = $request->validate([
            'name' => 'required',
            'year' => 'required|digits:4',
            'min_players' => 'required|numeric',
            'max_players' => 'required|numeric',
            'age_range' => 'required|numeric',
            'description' => 'required',
            'play_time' => 'required|numeric',
            'image_url' => 'required|url',
        ]);
        
        $game = BoardGame::findOrFail($id);

        $game->update($request->all());

        return redirect(action('BoardGameController@edit',compact('game')))->with('success','you successfully updated game: '.$request->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = BoardGame::findOrFail($id);

        $game->delete();

        return redirect(action('BoardGameController@index'))->with('success','you successfully deleted game: '.$game->name);
    }

    public function search(Request $request){

/* return 'abc'; */

        $search = $request->search;
        $games = BoardGame::where('name', 'like', '%'.$search.'%')->get();
        return $games;
     }

     public function rating(Request $request, $id)
     {
         $rate = Rating::where('board_game_id', $id)->where('user_id', \Auth::id())->first();
         if($rate){
 
             $rate->board_game_id = $id;
             $rate->rating = $request->rating;
             $rate->user_id = \Auth::id();
             $rate->update();
             return back()->with('warning', 'You changed your vote to '.$request->rating);
         } else {
         
             $rate = new Rating;
             $rate->board_game_id = $id;
             $rate->rating = $request->rating;
             $rate->user_id = \Auth::id();
             $rate->save();
 
         }
 
          return back()->with('success', 'You just voted '.$request->rating);; 
     }

}
