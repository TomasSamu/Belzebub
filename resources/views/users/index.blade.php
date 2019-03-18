@extends('layouts.home')


@section('content')

<h1>Users</h1>

<div class="container">
    <div class="row">

        @foreach ($users as $user) 
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">         
    {{-- pass to custom --}}

    <div class="card m-2 p-2 shadow p-2 mb-4 bg-white rounded" style="width: 20rem; height: auto">

        <img class="card-img-top rounded-circle" src="{{$user->image}}" alt="Card image cap" style="width: 10rem">

        <div class="card-body">
            <h5 class="card-title">{{ $user->name}}</h5>
            <h6 class="card-text text-muted">{{ $user->city}}</h6>
            <p class="card-text h-6">{{ $user->gender}}</p>
            <p class="card-text h-6">This is a short introduction of the user.</p>

            <div class="card-buttons">
                <form method="GET" action="{{action('UserController@show',$user->id)}}">
                    @csrf
                    <input type="submit" value="Detail"></form>
                @can('admin')
                <form method="POST" action="{{action('UserController@destroy',$user->id)}}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Delete"></form>
                <form method="GET" action="{{action('UserController@edit',$user->id)}}">
                    @csrf
                    <input type="submit" value="Edit"></form>
                @endcan
            </div>

        </div>



    </div>
        </div>

    @endforeach
    </div>
</div>

@endsection
