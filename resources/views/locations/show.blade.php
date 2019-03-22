@extends('layouts.home')
@section('content')

<div class="sec-navbar">
    <form method="GET" action="{{action('LocationController@index',$location->id)}}">
        @csrf
        <input type="submit" value="Back" class="btn btn-sm btn-amber"></form>
</div>

<div class="container">
    <h1 class="display-3">{{$location->name}}</h1>
    <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src= "{{$location->image}}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>Google Maps Generator by <a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>

    <p class="lead">
        <h5>Description:{{$location->description}}</h5>
        <h5>Street: {{$location->street}}</h5>
        <h5>Zip Code: {{$location->zip_code}}</h5>
        <h5>City: {{$location->city}}</h5>
        <h5>Country: {{$location->country}}</h5>
        <h5>Web: <a href="{{$location->web}}" target="_blank">{{$location->web}}</a></h5>
    </p>


    <div class="buttons-edit">

        <form method="POST" action="{{action('LocationController@destroy',$location->id)}}">
            @method('DELETE')
            @csrf
            <button type="submit" value="Delete" class="btn btn-icon btn-red"><i class="fas fa-trash-alt"></i></button>
        </form>
        <form method="GET" action="{{action('LocationController@edit',$location->id)}}">
            @csrf
            <button type="submit" value="Edit" class="btn btn-icon btn-amber"><i class="fas fa-pen-alt"></i></button>
        </form>
    </div>
</div>

@endsection
