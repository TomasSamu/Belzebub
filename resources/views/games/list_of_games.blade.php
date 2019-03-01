@extends('layouts.home')

@section('content')

<div class="container">
        <!-- Content here -->
    <div class="content">
            <div class="row">
                    <!-- col- elements here -->
                @foreach ($games as $game)
                @if($game->image)
                {{-- trying to show only games with working image --}}
                <div class="col-6">
                    <div class="card">
                            <img class="card-img-top" src="{{$game->image}}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">{{$game->name}}</h4>

                        <a href="{{action('GameController@detail', $game->id)}}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>          
                </div>
                @endif
                @endforeach
                {{$games->onEachSide(1)->links()}}
                {{-- {{ $game->links()}} --}}
        </div>
    </div>

</div>

@endsection