@extends('layouts.home')
@section('content')

<div class="sec-navbar">
        <form method="GET" action="{{action('UserController@index',$user->id)}}">
                @csrf
        <input type="submit" value="Back" class="btn btn-sm btn-amber"></form>
    </div>
    

<div class="container">
    
    <form method="POST" action="{{action('UserController@update', $user->id)}}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Title</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Publishing year</label>
            <input type="text" class="form-control" id="year" name="username" value="{{$user->username}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Minimal number of Players</label>
            <input type="text" class="form-control" id="min_players" name="email" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Maximal number of Players</label>
            <input type="text" class="form-control" id="max_players" name="year_of_birth" value="{{$user->year_of_birth}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Recommended Age</label>
            <input type="text" class="form-control" id="age_range" name="age_range" value="{{$user->gender}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Short description of the user</label>
            <input type="text" class="form-control" id="description" name="city" value="{{$user->city}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Average play time</label>
            <input type="text" class="form-control" id="play_time" name="image" value="{{$user->image}}">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-amber" value="Update">
        </div>
        
    </form>

</div>
@endsection