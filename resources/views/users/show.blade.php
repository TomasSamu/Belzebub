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
                        <h5>Email: {{$user->email}}</h5>
                        <h5>Gender: {{$user->gender}}</h5>
                        <h5>City: {{$user->city}}</h5>
                        <h5>Country: {{$user->country}}</h5>
                    </p>
                    <div class="row">
                        <form method="GET" action="{{action('UserController@index',$user->id)}}">
                                @csrf
                        <input type="submit" value="Back"></form>
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
    </div>

</div>

@endsection