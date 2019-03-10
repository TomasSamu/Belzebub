@extends('layouts.home')

@section('content')

        <!-- Content here -->
<div class="container">
            <div class="row">
                    
                <!-- col- elements here -->
                @foreach ($games as $game) 
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-4">           
                {{-- <div class="col-2"> --}}
                    <div class="card">
                            <img class="card-img-top" src="{{$game->image_url}}" alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-title">{{$game->name}}</h6>
                            <form method="GET" action="{{action('FeaturesController@addGameToCollection',$game->id)}}">
                                    @csrf
                            <input type="submit" value="Add to Collection"></form>
                            <form method="GET" action="{{action('BoardGameController@show',$game->id)}}">
                                @csrf
                            <input type="submit" value="Detail"></form>

                            @can('admin')
                            <form method="POST" action="{{action('BoardGameController@destroy',$game->id)}}">
                                @method('DELETE')
                                @csrf
                            <input type="submit" value="Delete"></form>
                            <form method="GET" action="{{action('BoardGameController@edit',$game->id)}}">
                                @csrf
                            <input type="submit" value="Edit"></form>
                            @endcan

                        </div>
                    </div>
                </div>   
    
                @endforeach          
        </div>
    
    
                <div class="new-item">
                    <form method="GET" action="{{action('BoardGameController@create')}}">
                            @csrf
                    <input type="submit" value="Add a new game"></form><br>
                </div>
    
    
                <div class="pagination">{{$games->onEachSide(1)->links()}}</div>
</div>



@endsection