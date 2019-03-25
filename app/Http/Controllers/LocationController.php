<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Event;
use App\Rating;
class LocationController extends Controller
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
        $locations = Location::paginate(6);
        $list = view('locations.index', compact('locations'));

        return $list;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = view('locations.create');
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
        $location = new Location;

        $validator = $request->validate([
            'name' => 'required',
            'description' => 'required|max:250',
            'street' => 'required',
            'zip_code' => 'required:numeric',
            'city' => 'required',
            'country' => 'required',
            /* 'web' => 'required',
             'image' => 'required|url' */
        ]);

        $location->fill($request->only([
            "name",
            "description",
            "street",
            "zip_code",
            "city",
            "country",
            "web",
            "image", 
        ]));    
        $location->save();

        return redirect(action('LocationController@index'))->with('success','you successfully created location: '.$request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::find($id);
        $avgRating = round(Rating::where('location_id', $id)->avg('rating'), 2);
        $detail = view('locations.show',compact(['location', 'avgRating']));
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
        $location = Location::find($id);
        $form = view('locations.edit',compact('location'));
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
            'description' => 'required|max:250',
            'street' => 'required',
            'zip_code' => 'required:numeric',
            'city' => 'required',
            'country' => 'required',
            /* 'web' => 'required',
             'image' => 'required|url' */
        ]);
        
        $location = Location::findOrFail($id);

        $location->update($request->all());

        return redirect(action('LocationController@edit',compact('location')))->with('success','you successfully updated location: '.$location->name);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

//******** delete the events associatet with the deleted location *******/
/*         $events = Event::where('location_id', $id) ->get();
        foreach($events as $event){
            $event->delete(); 
        } */

        return redirect(action('LocationController@index'))->with('success','you successfully deleted location: '.$location->name);
    }

    public function rating(Request $request, $id)
     {
         $rate = Rating::where('location_id', $id)->where('user_id', \Auth::id())->first();
         if($rate){
 
             $rate->location_id = $id;
             $rate->rating = $request->rating;
             $rate->user_id = \Auth::id();
             $rate->update();
             return back()->with('warning', 'You changed your vote to '.$request->rating);
         } else {
         
             $rate = new Rating;
             $rate->location_id = $id;
             $rate->rating = $request->rating;
             $rate->user_id = \Auth::id();
             $rate->save();
 
         }
 
          return back()->with('success', 'You just voted '.$request->rating);; 
     }
}
