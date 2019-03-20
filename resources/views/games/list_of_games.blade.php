@extends('layouts.home')
@section('content')

<div class="sec-navbar">
    <form method="GET" action="{{action('BoardGameController@create')}}">
        @csrf
        <input type="submit" value="Add a new game" class="btn btn-sm btn-amber"></form>
    <div class="pagination pg-amber">{{$games->onEachSide(1)->links()}}</div>
</div>



    <div class="grid-container">

        @foreach ($games as $game)   
            <div class="card mb-3 game-card">
                <img class="card-img-top" src="{{$game->image_url}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$game->name}}</h6>


                        <div class="buttons-edit">
                            @auth
                            <form method="GET" action="{{action('FeaturesController@addGameToCollection',$game->id)}}">
                                @csrf
                                <button type="submit" value="Add" class="btn btn-icon btn-green"><i
                                        class="fas fa-plus"></i></button></form>
                            @endauth
                            <form method="GET" action="{{action('BoardGameController@show',$game->id)}}">
                                @csrf
                                <button type="submit" value="Detail" class="btn btn-icon btn-info"><i
                                        class="fas fa-info"></i></button></form>

                            @can('admin')
                            <form method="POST" action="{{action('BoardGameController@destroy',$game->id)}}">
                                @method('DELETE')
                                @csrf
                                <button type="submit" value="Delete" class="btn btn-icon btn-red"><i
                                        class="far fa-trash-alt"></i></button></form>
                            <form method="GET" action="{{action('BoardGameController@edit',$game->id)}}">
                                @csrf
                                <button type="submit" value="Edit" class="btn btn-icon btn-amber"><i
                                        class="fas fa-pen"></i></button></form>
                            @endcan

                        </div>
                </div>
            </div>
        @endforeach
    </div>




@endsection
