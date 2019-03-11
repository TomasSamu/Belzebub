@extends('layouts.home')

@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3">{{$game->name}}</h1>
        <img src="{{$game->image_url}}" alt="image">
        <p class="lead">
            <h5>Published: {{$game->year}}</h5>
            <h5>Number of players: {{$game->min_players}} - {{$game->max_players}}</h5>
            <h5>Age: {{$game->age_range}}</h5>
            <h5>Average playtime: {{$game->play_time}}</h5>
            <h5>Description: <br>{{$game->description}}</h5>
        </p>
        <form method="GET" action="{{action('BoardGameController@index',$game->id)}}">
                @csrf
        <input type="submit" value="Back"></form>
        @auth
        <form method="POST" action="{{action('BoardGameController@destroy',$game->id)}}">
                @method('DELETE')
                @csrf
        <input type="submit" value="Delete"></form>

        <form method="GET" action="{{action('BoardGameController@edit',$game->id)}}">
                @csrf
        <input type="submit" value="Edit"></form>
        @endauth
    </div>
</div>

@endsection