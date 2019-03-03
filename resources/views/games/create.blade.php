@extends('layouts.main')

@section('title', 'Add new Game')
{{-- @include('layouts.navigation') --}}
@section('content')



<form method="post" action="{{action('BoardGameController@store')}}">
    @csrf

    <div class="form-group">
        <label for="formGroupExampleInput">Title</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name of the Boardgame">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Publishing year</label>
        <input type="text" class="form-control" id="year" name="year" placeholder="e.g. 2009">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Minimal number of Players</label>
        <input type="text" class="form-control" id="min_players" name="min_players" placeholder="e.g. 1">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Maximal number of Players</label>
        <input type="text" class="form-control" id="max_players" name="max_players" placeholder="e.g. 5">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Recommended Age</label>
        <input type="text" class="form-control" id="age_range" name="age_range" placeholder="e.g. 9+">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Short description of the game</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="e.g. theme, mechanics">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Average play time</label>
        <input type="text" class="form-control" id="play_time" name="play_time" placeholder="number of minutes">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Image</label>
        <input type="text" class="form-control" id="image_url" name="image_url" placeholder="Url to the image" value="">
    </div>
    <div class="form-group">
        <input type="submit" class="form-control" value="Submit">
    </div>

</form>

@endsection