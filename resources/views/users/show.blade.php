@extends('layouts.home')

@section('content')
<div class="container">

    <div class="container user-profile">
        <div class="row">
            <div class="user-prof-left">
                <h1 class="username">{{$user->name}}</h1>
                <img src="{{$user->image}}" alt="image" class="card-img-top rounded-circle img-fluid user-img-circle">
            </div>
            <div class="user-prof-right">
                <p class="lead">
                    <h2>Username: {{$user->username}}</h2>
                    <h5>Email: {{$user->email}}</h5>
                    <h5>Gender: {{$user->gender}}</h5>
                    <h5>City: {{$user->city}}</h5>
                    <h5>Country: {{$user->country}}</h5>
                </p>
                <div class="buttons-edit">
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
        </div>
    </div>


    <div class="container">
        <h5>My Collection</h5>
        <div class="user-collection row">
            @foreach ($user->boardgames as $boardgame)
            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 m-2 p-2">
                <div class="card mb-3">
                    <a href="{{action('BoardGameController@show',$boardgame->id )}}">
                        <img class="card-img-top" src="{{$boardgame->image_url}}" alt="Card image cap">
                    </a>

                    <div class="card-body">
                        <h5 class="card-title">{{$boardgame->name}}</h5>

                        {{-- add picture --}}
                        <div class="buttons-edit">
                            <form method="POST" action="{{action('FeaturesController@removeGameFromCollection',$boardgame->id)}}">
                                @csrf
                                <button type="submit" value="remove" class="btn btn-icon btn-red"><i class="far fa-trash-alt"></i></button></form>
                            <form method="POST" action="{{action('FeaturesController@createOffer',$boardgame->id)}}">
                                @csrf
                                <button type="submit" value="offer" class="btn btn-icon btn-green"><i class="fas fa-exchange-alt"></i></button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container">

        <h5>My Favourite Genres</h5>

        <div class="user-genres row"> .
            @foreach ($user->genres as $genre)
            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 m-2 p-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">{{$genre->name}}</h5>
                        <div class="buttons-edit">
                            <form method="POST" action="{{action('FeaturesController@removeGenreFromCollection',$genre->id)}}">
                                @csrf
                                <button type="submit" value="remove" class="btn btn-xs btn-red"><i class="far fa-trash-alt"></i></button></form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    <div class="container">

        <h5>I am organizing these events:</h5>
        <div class="user-events row">
            @if ($user->events)

            @foreach ($user->events as $event)
            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 m-2 p-3">
                <div class="card mb-2">
                    <div class="card-body">

                        <a href="{{action('EventController@show', $event->id)}}">{{$event->title}}
                        </a>
                        <div class="buttons-edit">
                            <form method="POST" action="{{action('EventController@destroy', $event->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" value="delete" class="btn btn-xs btn-red"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @endif
        </div>
    </div>

    <div class="container">

        <h5>I am attending these events:</h5>
        <div class=" user-events-attend row">
            @foreach ($user->attend_events as $event)
            <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 m-2 p-3">
                <div class="card mb-2">

                    <div class="card-body">
                        <a href="{{action('EventController@show', $event->id)}}">{{$event->title}}
                        </a>
                        <div class="buttons-edit">
                            <form method="POST" action="{{action('FeaturesController@unattendEvent', $event->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" value="unattend" class="btn btn-xs btn-red"><i class="fas fa-ban"></i></button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>



</div>

@endsection
