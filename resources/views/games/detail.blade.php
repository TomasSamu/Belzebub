@extends('layouts.home')

@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3">{{$game->name}}</h1>
        <img src="{{$game->image}}" alt="image">
        <p class="lead">
            <h5>Number of players: {{$game->min_players}} - {{$game->max_players}}</h5>
            <h5>Age: {{$game->age_range}}</h5>
            <h5>Average playtime: {{$game->play_time}}</h5>
            <h5>Description:
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit temporibus ut tenetur, necessitatibus, voluptate ducimus harum ipsum sint fugiat, quod quia unde eos accusantium fuga eligendi nostrum nihil repudiandae blanditiis?</h5>
        </p>
        </div>
    </div>

@endsection