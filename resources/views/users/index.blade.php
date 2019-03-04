@extends('layouts.home')


@section('content')

    <h1>Users</h1>

        <div class="card-deck">
                @foreach ($users as $user)

                {{-- pass to custom --}}
            <div class="card m-3 p-2" style="width: 8rem;">
              <img class="card-img-top" src="{{$user->image}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{ $user->name}}</h5>
                <h6 class="card-text">{{ $user->gender}}</h6>
                <h5 class="card-text text-muted">{{ $user->city}}</h5>
                <p class="card-text h-6">This is a short introduction of the user.</p>
              </div>
              <form method="GET" action="{{action('UserController@show',$user->id)}}">
                  @csrf
              <input type="submit" value="Detail"></form>
              <form method="POST" action="{{action('UserController@destroy',$user->id)}}">
                      @method('DELETE')
                      @csrf
              <input type="submit" value="Delete"></form>
              <form method="GET" action="{{action('UserController@edit',$user->id)}}">
                      @csrf
              <input type="submit" value="Edit"></form>
            </div>
            @endforeach
        </div>

@endsection       