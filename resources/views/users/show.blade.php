@extends('layouts.home')

@section('content')
<div class="container">

    <div class="container user-profile">
        <h1 class="display-3">{{$user->name}}</h1>
        <img src="{{$user->image}}" alt="image" class="user-profile-picture rounded-circle">
        <p class="lead">
            <h5>Username: {{$user->username}}</h5>
            <h6>Email: {{$user->email}}</h6>
            <h6>Gender: {{$user->gender}}</h6>
            <h6>City: {{$user->city}}</h6>
            <h6>Country: {{$user->country}}</h6>
        </p>
        <div class="row">
            <form method="GET" action="{{action('UserController@index',$user->id)}}">
                @csrf
                <input type="submit" value="Back" class="btn btn-sm btn-blue"></form>
            <form method="POST" action="{{action('UserController@destroy',$user->id)}}">
                @method('DELETE')
                @csrf
                <input type="submit" value="Delete" class="btn btn-sm btn-red"></form>
            <form method="GET" action="{{action('UserController@edit',$user->id)}}">
                @csrf
                <input type="submit" value="Edit" class="btn btn-sm btn-amber"></form>
        </div>
    </div>


    <div class="container">
        <h1>My Collection</h1>
        <div class="user-collection row">
            @foreach ($user->boardgames as $boardgame)
            <div class="card col-3 m-2">

                <a href="{{action('BoardGameController@show',$boardgame->id )}}">
                    {{$boardgame->name}}
                </a>
                <form method="POST" action="{{action('FeaturesController@removeGameFromCollection',$boardgame->id)}}">
                    @csrf
                    <input type="submit" value="remove" class="btn btn-sm btn-red"></form>
                <form method="POST" action="{{action('FeaturesController@createOffer',$boardgame->id)}}">
                    @csrf
                    <input type="submit" value="offer" class="btn btn-sm btn-green"></form>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container">

        <h1>My Favourite Genres</h1>

        <div class="user-genres row"> .
            @foreach ($user->genres as $genre)
            <div class="card col-2 m-2">
                {{$genre->name}}
                <form method="POST" action="{{action('FeaturesController@removeGenreFromCollection',$genre->id)}}">
                    @csrf
                    <input type="submit" value="remove" class="btn btn-sm btn-red"></form>
            </div>
            @endforeach
        </div>

    </div>

    <div class="container">

        <h1>I am organizing these events:</h1>
        <div class="user-events row">
            @if ($user->events)

            @foreach ($user->events as $event)
            <div class="card col-2 m-2">

                <a href="{{action('EventController@show', $event->id)}}">{{$event->title}}
                </a>
                <form method="POST" action="{{action('EventController@destroy', $event->id)}}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="delete" class="btn btn-sm btn-red">
                </form>

            </div>
            @endforeach

            @endif
        </div>
    </div>

    <div class="container">
        
            <h1>I am attending these events:</h1>
            @foreach ($user->attend_events as $event)
            <div class=" user-events-attend row">
       
                    <a href="{{action('EventController@show', $event->id)}}">{{$event->title}}
                    </a>
                    <form method="POST" action="{{action('FeaturesController@unattendEvent', $event->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-primary" value="unattend" class="btn btn-sm btn-red">
                    </form>
    
                </div>
            @endforeach
        </div>
    </div>



</div>

@endsection
