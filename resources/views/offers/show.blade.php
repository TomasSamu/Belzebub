@extends('layouts.home')

@section('content')


    <div class="container">
        <h1 class="display-3">{{$offer->title}}</h1>
        <p class="lead">
            <h4>Time created: {{$offer->created_at}}</h4>
        <h5>Trader: <a href="{{action('UserController@show',$offer->user->id)}}">{{$offer->user->name}}</a></h5>
            <h5>Game on Offer: <a href="{{action('BoardGameController@show',$offer->boardgame->id)}}">{{$offer->boardgame->name}}</a></h5>
            <img src="{{action('BoardGameController@show',$offer->boardgame->image_url)}}" />
        {{-- <form method="GET" action="{{action('offersController@index',$offers->id)}}">
                @csrf
        <input type="submit" value="Back"></form>
        <form method="POST" action="{{action('offersController@destroy',$offers->id)}}">
                @method('DELETE')
                @csrf
        <input type="submit" value="Delete"></form>
        <form method="GET" action="{{action('offersController@edit',$offers->id)}}">
                @csrf
        <input type="submit" value="Edit"></form> --}}
    </div>

@endsection