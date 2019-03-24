<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Location;
use App\Comment;
use App\User;
use App\Rating;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $events = Event::paginate(5);
        $locations = Location::all();
        

        return view('events.list_of_events', compact(['events', 'locations']));
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

        $dateTimeRaw = $request->date_time;
        $dateTime = preg_split("/[\s,]+/", $dateTimeRaw);
          
        $validator = $request->validate([
            'title' => 'required',
            'text' => 'required|max:250',
            'num_of_players' => 'required|numeric',
            'date_time' => 'required',
            'location_id' => 'required',
        ]);

        $event = new Event;
        $event->title = $request->title;
        $event->user_id = \Auth::id();
        $event->text = $request->text;
        $event->num_of_players = $request->num_of_players;
        $event->date = $dateTime[0];
        $event->time = $dateTime[1];
        $event->location_id = $request->location_id;
        $event->save();

        return redirect(action('EventController@index'))->with('success','you successfully created a new event');

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
     /*    $location = Location::find($event->location_id); */
        /* $comments = Comment::where('event_id',$id)->get(); */
        $avgRating = round(Rating::where('event_id', $id)->avg('rating'), 2);

        $created_by = User::where('id', $event->user_id)->first();
        return view('events.detail',compact(['event', 'created_by', 'avgRating']));
        
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
        return back()->with('success','you successfully deleted event: '.$event->title); 
    }

    public function eventsByParam(Request $request)
    {
        $date = $request->dateFilter;
        $venue_id = $request->location_id;

        $eventQuery = Event::query();

        if($date !== null){
            $eventQuery->where('date', $date);
        }

        if($venue_id !== null){
            $eventQuery->where('location_id', $venue_id);
            $venue = Location::findOrFail($venue_id);
        } else {
            $venue=null;
        }
      
        $events = $eventQuery->get();
        $locations = Location::all(); //needed for dropdown
        
        return view('events.events_filter', compact(['events', 'venue', 'locations', 'date']));
    }

    public function rating(Request $request, $id)
    {
        $rate = Rating::where('event_id', $id)->where('user_id', \Auth::id())->first();
        if($rate){

            $rate->event_id = $id;
            $rate->rating = $request->rating;
            $rate->user_id = \Auth::id();
            $rate->update();
            return back()->with('warning', 'You changed your vote to '.$request->rating);
        } else {
        
            $rate = new Rating;
            $rate->event_id = $id;
            $rate->rating = $request->rating;
            $rate->user_id = \Auth::id();
            $rate->save();

        }

         return back()->with('success', 'You just voted '.$request->rating);; 
    }


}
