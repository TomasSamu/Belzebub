@extends('layouts.home')
@section('content')

<div class="sec-navbar">
    <form method="GET" action="{{action('UserController@index',$user->id)}}">
        @csrf
    <input type="submit" value="Back" class="btn btn-sm btn-blue"></form>
</div>

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
        <h2>My Collection</h2>
        <div class="grid-container">
            @foreach ($user->boardgames as $boardgame)
            <div class="card mb-3">
                <a href="{{action('BoardGameController@show',$boardgame->id )}}">
                    <img class="card-img-top" src="{{$boardgame->image_url}}" alt="Card image cap">
                </a>

                <div class="card-body">
                    <h4 class="card-title">{{$boardgame->name}}</h4>

                    {{-- add picture --}}
                    <div class="buttons-edit">
                        <form method="POST"
                            action="{{action('FeaturesController@removeGameFromCollection',$boardgame->id)}}">
                            @csrf
                            <button type="submit" value="remove" class="btn btn-icon btn-red"><i
                                    class="far fa-trash-alt"></i></button></form>
                        <form method="POST" action="{{action('FeaturesController@createOffer',$boardgame->id)}}">
                            @csrf
                            <button type="submit" value="offer" class="btn btn-icon btn-green"><i
                                    class="fas fa-exchange-alt"></i></button>

                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container">

        <h2>My Favourite Genres</h2>

        <div class="grid-container"> .
            @foreach ($user->genres as $genre)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{$genre->name}}</h5>
                    <div class="buttons-edit">
                        <form method="POST"
                        action="{{action('FeaturesController@removeGenreFromCollection',$genre->id)}}">
                        @csrf
                        <button type="submit" value="remove" class="btn btn-xs btn-red"><i
                        class="far fa-trash-alt"></i></button></form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    <div class="container">

        @if ($user->events)
        <h2>I am organizing these events:</h2>
        <div class="grid-container">

            @foreach ($user->events as $event)
            <div class="card mb-2">
                <div class="card-body">

                    <a href="{{action('EventController@show', $event->id)}}">{{$event->title}}
                    </a>
                    <div class="buttons-edit">
                        <form method="POST" action="{{action('EventController@destroy', $event->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" value="delete" class="btn btn-xs btn-red"><i
                                    class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

            @endif
        </div>
    </div>

    <div class="container">

        <h2>I am attending these events:</h2>
        <div class="grid-container">
            @foreach ($user->attend_events as $event)
            <div class="card mb-2">

                <div class="card-body">
                    <a href="{{action('EventController@show', $event->id)}}">{{$event->title}}
                    </a>
                    <div class="buttons-edit">
                        <form method="POST" action="{{action('FeaturesController@unattendEvent', $event->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" value="unattend" class="btn btn-xs btn-red"><i
                                    class="fas fa-ban"></i></button>
                        </form>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>



</div>

@endsection
