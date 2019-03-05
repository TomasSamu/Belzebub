<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
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

        // $this->validate($request, [
        //     'title' => 'required|min:10',
        //     'text' => 'required',
        //     'option1' => 'required',
        //     'option2' => 'required'
        // ]);

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
        $detail = view('locations.show',compact('location'));
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

        return redirect(action('LocationController@index'))->with('success','you successfully deleted location: '.$location->name);
    }
}
