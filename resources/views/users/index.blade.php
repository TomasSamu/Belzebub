@extends('layouts.home')

@section('content')

<div class="sec-navbar">
        <h2 class="title-bar">Users</h2>
</div>

<div class="grid-container">


        @foreach ($users as $user)
            {{-- pass to custom --}}

            <div class="card m-2 p-2 shadow mb-4">


                <a href="{{action('UserController@show',$user->id)}}"><img class="rounded-circle user-img-circle" src="{{$user->image}}" alt="Card image cap" /></a>


                <div class="card-body user-card-body">
                    <h5 class="card-title">{{ $user->name}}</h5>
                    <h6 class="card-text">{{ $user->city}}</h6>
                    <p class="card-text">{{ $user->gender}}</p>
                    <p class="card-text">This is a short introduction of the user.</p>

                    <div class="buttons-edit">
                        <form method="GET" action="{{action('UserController@show',$user->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-icon btn-info" value="Detail"><i class="fas fa-info"></i></button></form>
                        @can('admin')
                        <form method="POST" action="{{action('UserController@destroy',$user->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-icon btn-red" value="Delete"><i class="far fa-trash-alt"></i></button></form>
                        <form method="GET" action="{{action('UserController@edit',$user->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-icon btn-amber" value="Edit"><i class="fas fa-pen"></i></button></form>
                        @endcan
                    </div>

                </div>



            </div>


        @endforeach
    </div>

@endsection
