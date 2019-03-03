@extends('layouts.main')

@section('content')

<div class="container">
        <!-- Content here -->
    <form method="GET" action="{{action('BoardGameController@create')}}">
            @csrf
    <input type="submit" value="Add a new game"></form><br>

    <div class="content">
            <div class="row">
                    <!-- col- elements here -->
                @foreach ($games as $game)
                
                {{-- trying to show only games with working image --}}
                <div class="col-6">
                    <div class="card">
                            <img class="card-img-top" src="{{$game->image_url}}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">{{$game->name}}</h4>
                            <form method="GET" action="{{action('BoardGameController@show',$game->id)}}">
                                @csrf
                            <input type="submit" value="Detail"></form>
                            <form method="POST" action="{{action('BoardGameController@destroy',$game->id)}}">
                                @method('DELETE')
                                @csrf
                            <input type="submit" value="Delete"></form>
                            <form method="GET" action="{{action('BoardGameController@edit',$game->id)}}">
                                @csrf
                            <input type="submit" value="Edit"></form>
                            </div>
                        </div>
                    </div>          
                </div>
                
                @endforeach
                {{$games->onEachSide(1)->links()}}
                {{-- {{ $game->links()}} --}}
        </div>
    </div>

</div>

@endsection