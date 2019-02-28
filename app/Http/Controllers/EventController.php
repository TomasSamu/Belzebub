<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Location;
use App\User;

class EventController extends Controller
{
    
    public function list()
    {
        $events = Event::all();
        return view('events/list', compact(['events']));
    }

    public function create()
    {

        $locations = Location::all();
        $users = User::all();
        return view ('events.create', compact(['locations','users']));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $event = Event::create($data);
    }


}
