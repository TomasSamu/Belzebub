<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Location;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(3);
        return view('events.list_of_events', compact(['events']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();
        return view ('events.create', compact(['locations']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'text' => 'required|max:250',
            'num_of_players' => 'required|numeric',
            'date' => 'required|date',
            'time' => 'required',
            'location_id' => 'required',
        ]);

        $event = new Event;
        $event->title = $request->title;
        $event->user_id = \Auth::id();
        $event->text = $request->text;
        $event->num_of_players = $request->num_of_players;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->location_id = $request->location_id;
        $event->save();

        return redirect(action('EventController@list'))->with('success','you successfully created a new event');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $event = Event::find($id);
        $location = Location::find($event->location_id);
        return view('events.detail',compact(['event','location']));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $location = Location::findOrFail($event->location_id);
        $locations = Location::all();
    
        return view('events.edit', compact(['event','location','locations']));
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
            'title' => 'required',
            'text' => 'required|max:250',
            'num_of_players' => 'required|numeric',
            'date' => 'required|date',
            'time' => 'required',
            'location_id' => 'required',
        ]);
    
            $event = Event::findOrFail($id);
            $event -> update($request->all());
            return redirect(action('EventController@index'))->with('success','you successfully updated event: '.$request->title);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect(action('EventController@index'))->with('success','you successfully deleted event: '.$event->title); 

    }
}
