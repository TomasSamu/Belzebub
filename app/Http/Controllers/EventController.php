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
        $events = Event::all();
        return view('events/list_of_events', compact(['events']));
    }

    public function create()
    {

        $locations = Location::all();
        $users = User::all();
        return view ('events.create', compact(['locations','users']));
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


/***** also an option but user id filled from \Auth not from the request 
     $data = $request->all();
    $event = Event::create($data); */


    }


}
