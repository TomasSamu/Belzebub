@extends('layouts.home')
@section('content')

<div class="sec-navbar">
    <form method="GET" action="{{action('LocationController@index',$location->id)}}">
        @csrf
        <input type="submit" value="Back" class="btn btn-sm btn-amber"></form>
</div>

<div class="container">
    <h1 class="display-3">{{$location->name}}</h1>
    <img src="{{$location->image}}" alt="image">

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
