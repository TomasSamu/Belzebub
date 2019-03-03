@extends('layouts.main')

@section('title', 'Edit a Game')
{{-- @include('layouts.navigation') --}}
@section('content')



<form method="POST" action="{{action('BoardGameController@update', $game->id)}}">
    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="formGroupExampleInput">Title</label>
    <input type="text" class="form-control" name="name" id="name" value="{{$game->name}}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Publishing year</label>
        <input type="text" class="form-control" id="year" name="year" value="{{$game->year}}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Minimal number of Players</label>
        <input type="text" class="form-control" id="min_players" name="min_players" value="{{$game->min_players}}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Maximal number of Players</label>
        <input type="text" class="form-control" id="max_players" name="max_players" value="{{$game->max_players}}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Recommended Age</label>
        <input type="text" class="form-control" id="age_range" name="age_range" value="{{$game->age_range}}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Short description of the game</label>
        <input type="text" class="form-control" id="description" name="description" value="{{$game->description}}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Average play time</label>
        <input type="text" class="form-control" id="play_time" name="play_time" value="{{$game->play_time}}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Image</label>
        <input type="text" class="form-control" id="image_url" name="image_url" value="{{$game->image_url}}">
    </div>
    <div class="form-group">
        <input type="submit" class="form-control" value="Update">
    </div>

</form>

@endsection