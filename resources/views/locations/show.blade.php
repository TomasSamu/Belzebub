@extends('layouts.home')

@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3">{{$location->name}}</h1>
        <img src="{{$location->image}}" alt="image">
        <p class="lead">
            <h5>Description: <br>{{$location->description}}</h5>
            <h5>Street: {{$location->street}}</h5>
            <h5>Zip Code: {{$location->zip_code}}</h5>
            <h5>City: {{$location->city}}</h5>
            <h5>Country: {{$location->country}}</h5>
            <h5>Web: <a href="">{{$location->web}}</a></h5>
        </p>
        <form method="GET" action="{{action('LocationController@index',$location->id)}}">
                @csrf
        <input type="submit" value="Back"></form>
        <form method="POST" action="{{action('LocationController@destroy',$location->id)}}">
                @method('DELETE')
                @csrf
        <input type="submit" value="Delete"></form>
        <form method="GET" action="{{action('LocationController@edit',$location->id)}}">
                @csrf
        <input type="submit" value="Edit"></form>
    </div>
</div>

@endsection