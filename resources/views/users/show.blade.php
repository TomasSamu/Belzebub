@extends('layouts.home')
@section('content')

<div class="sec-navbar">
    <form method="GET" action="{{action('UserController@index',$user->id)}}">
        @csrf
    <input type="submit" value="Back" class="btn btn-sm btn-blue"></form>
</div>

<div class="container">

    <div class="user-profile">

            <div class="user-profile-left">
                <img src="{{$user->image}}" alt="image" class="rounded-circle img-fluid img-detail">
                <h1 class="username">{{$user->name}}</h1>
            </div>
            <div class="user-profile-right">
                <div class="lead">
                    <p>Username:{{$user->username}}</p>
                    <p>Email: {{$user->email}}</p>
                    <p>Gender: {{$user->gender}}</p>
                    <p>City: {{$user->city}}</p>
                    <p>Country: {{$user->country}}</p>

                    @php
                        $isAdmin = App\User::find(Auth::id());   
                    @endphp

                    @if (Auth::id() == $user->id || Auth::id()==$isAdmin->is_admin)
                        <div class="buttons-edit">                            
                                <form method="POST" action="{{action('UserController@destroy',$user->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Delete" class="btn btn-sm btn-red"></form>
                                <form method="GET" action="{{action('UserController@edit',$user->id)}}">
                                    @csrf
                                    <input type="submit" value="Edit" class="btn btn-sm btn-amber"></form>
                        </div>
                    @endif
                    
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
                    @if (Auth::id() == $user->id)
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
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="container">

        <h2>My Favourite Genres</h2>

        <div class="grid-container"> .
            @foreach ($user->genres as $genre)
            <div class="card card-event rounded-pill">
                <div class="card-body">
                    <a href="">{{$genre->name}}</a>
                    @if (Auth::id() == $user->id)
                    <div class="buttons-edit">
                        <form method="POST"
                        action="{{action('FeaturesController@removeGenreFromCollection',$genre->id)}}">
                        @csrf
                        <button type="submit" value="remove" class="btn btn-xs btn-red"><i
                        class="far fa-trash-alt"></i></button></form>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

    </div>

    <div class="container">

        @if ($user->events->count() > 0)
        <h2>I am organizing these events:</h2>
        <div class="grid-container">

            @foreach ($user->events as $event)
            <div class="card card-event rounded-pill">
                <div class="card-body">

                        <a href="{{action('EventController@show', $event->id)}}">{{$event->title}}
                        </a>
                    @if (Auth::id() == $user->id)
                    <div class="buttons-edit">
                        <form method="POST" action="{{action('EventController@destroy', $event->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" value="delete" class="btn btn-xs btn-red"><i
                                    class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach

            @else
            <h2>I am not organizing any events yet:</h2>
            <p><a href="{{action('EventController@create')}}"> Create new event</a><p>
        
            @endif
        </div>
    </div>

    <div class="container">
        @if ($user->attend_events()->count() > 0)
        <h2>I am attending these events:</h2>
        <div class="grid-container">
            @foreach ($user->attend_events as $event)
            <div class="card card-event">

                <div class="card-body">
                        <a href="{{action('EventController@show', $event->id)}}">{{$event->title}}
                        </a>
                    @if (Auth::id() == $user->id)
                    <div class="buttons-edit">
                        <form method="POST" action="{{action('FeaturesController@unattendEvent', $event->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" value="unattend" class="btn btn-xs btn-red"><i
                                    class="fas fa-ban"></i></button>
                        </form>
                    </div>
                    @endif

                </div>
            </div>
            @endforeach
        </div>

        @else
        <h2>I am not attending any events yet</h2>
        <p><a href="{{action('EventController@index')}}"> Check out the coming events</a><p>
        @endif
    </div>



</div>

@endsection
