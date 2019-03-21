@extends('layouts.home')

@section('content')

<div class="sec-navbar">
    <form method="GET" action="{{action('BoardGameController@index',$game->id)}}">
        @csrf
        <input type="submit" value="Back" class="btn btn-sm btn-amber"></form>
</div>


<div class="container">
    <h1 class="title">{{$game->name}}</h1>
    <img src="{{$game->image_url}}" alt="image" class="CHANGETHIS">
    <div class="event-info">
        <p class="lead">
            <h5>Published: {{$game->year}}</h5>
            <h5>Number of players: {{$game->min_players}} - {{$game->max_players}}</h5>
            <h5>Age: {{$game->age_range}}</h5>
            <h5>Average playtime: {{$game->play_time}}</h5>
            <h5>Description: <br>{{$game->description}}</h5>
        </p>
    </div>



    <div class="buttons-edit">
        @auth
        <form method="POST" action="{{action('BoardGameController@destroy',$game->id)}}">
            @method('DELETE')
            @csrf
            <button type="submit" value="Delete" class="btn btn-icon btn-red"><i class="fas fa-trash-alt"></i></button>
        </form>

        <form method="GET" action="{{action('BoardGameController@edit',$game->id)}}">
            @csrf
            <button type="submit" value="Edit" class="btn btn-icon btn-amber"><i class="fas fa-pen-alt"></i></button>
        </form>
        @endauth
    </div>
</div>

@endsection
