<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boardgame;
class BoardGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Boardgame::paginate(6);
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
        $game = new Boardgame;

        $this->validate($request, [
            'title' => 'required|min:10',
            'text' => 'required',
            'option1' => 'required',
            'option2' => 'required'
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
        $game = Boardgame::find($id);
        $detail = view('games.detail',compact('game'));
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
        $game = Boardgame::find($id);
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
        $game = Boardgame::findOrFail($id);

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
        $game = Boardgame::findOrFail($id);

        $game->delete();

        return redirect(action('BoardGameController@index'))->with('success','you successfully deleted game: '.$game->name);
    }
}
