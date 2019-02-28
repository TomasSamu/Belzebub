<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    
    public function list()
    {
        $events = Event::all();
        return view('events/list', compact(['events']));
    }

    public function create()
    {
        return view ('events.create');
    }


}
