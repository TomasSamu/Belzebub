@extends('layouts.home')

@section('content')
<div class="container">
    <div class="column">
        <div class="row">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-3">{{$user->name}}</h1>
                    <img src="{{$user->image}}" alt="image">
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
                        <input type="submit" value="Back" class=""></form>
                        <form method="POST" action="{{action('UserController@destroy',$user->id)}}">
                                @method('DELETE')
                                @csrf
                        <input type="submit" value="Delete"></form>
                        <form method="GET" action="{{action('UserController@edit',$user->id)}}">
                                @csrf
                        <input type="submit" value="Edit"></form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="card">
                <ul class="list-group list-group-flush">
                    <h1>My Collection</h1>
                    @foreach ($user->boardgames as $boardgame)
                    <li class="list-group-item">
                        <a href="{{action('BoardGameController@show',$boardgame->id )}}">
                            {{$boardgame->name}}
                        </a>
                    <form method="POST" action="{{action('FeaturesController@removeGameFromCollection',$boardgame->id)}}">
                        @csrf
                    <input type="submit" value="remove"></form>
                    <form method="POST" action="{{action('FeaturesController@createOffer',$boardgame->id)}}">
                        @csrf
                    <input type="submit" value="offer"></form>
                    
                    </li>
                    @endforeach
                </ul>
            </div> 
            <div class="card">
                <ul class="list-group list-group-flush">
                    <h1>My Favourite Genres</h1>
                    @foreach ($user->genres as $genre)
                    <li class="list-group-item">
                            {{$genre->name}}
                        <form method="POST" action="{{action('FeaturesController@removeGenreFromCollection',$genre->id)}}">
                            @csrf
                        <input type="submit" value="remove"></form>
                    </li>
                    @endforeach
                </ul>
            </div> 

            <div class="card">
                <ul class="list-group list-group-flush">
                    <h1>I am organizing these events:</h1>
                    @if ($user->events)
                        
                    @foreach ($user->events as $event)
                        <li class="list-group-item">
                            <div class="row">
                                <a href="{{action('EventController@show', $event->id)}}">{{$event->title}}
                                </a> 
                                <form method="POST"action="{{action('EventController@destroy', $event->id)}}">
                                    @csrf
                                    @method('DELETE')
                                <input type="submit" value="delete" class="btn btn-danger">
                                </form> 
                            </div>  
                        </li>
                    @endforeach

                    @endif
                </ul>
            </div> 

            <div class="card">
                <ul class="list-group list-group-flush">
                    <h1>I am attending these events:</h1>
                    @foreach ($user->attend_events as $event)
                        <li class="list-group-item">
                            <div class="row">
                                <a href="{{action('EventController@show', $event->id)}}">{{$event->title}}
                                </a>  
                            <form method="POST" action="{{action('FeaturesController@unattendEvent', $event->id)}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-primary" value="unattend">
                            </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div> 
            
        </div>
    </div>
</div>

@endsection