<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Location;
use App\User;
use Auth;

class EventController extends Controller
{
    
    public function list()
    {
        $events = Event::paginate(3);
        return view('events.list_of_events', compact(['events']));
    }

    public function create()
    {

        $locations = Location::all();
        return view ('events.create', compact(['locations']));
    }

    public function store(Request $request)
    {

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


/***** also an option but user id filled from \Auth not from the request 
     $data = $request->all();
    $event = Event::create($data); */
    }

    public function edit($id)
    {
      $event = Event::findOrFail($id);
      $location = Location::findOrFail($event->location_id);
      $locations = Location::all();

       return view('events.edit', compact(['event','location','locations']));

    }

    public function update($id, Request $request)
    {   
        $event = Event::findOrFail($id);
        $event -> update($request->all());
        return redirect(action('EventController@list'))->with('success','you successfully updated event: '.$request->title);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect(action('EventController@list'))->with('success','you successfully deleted event: '.$event->title); 
    }
}
