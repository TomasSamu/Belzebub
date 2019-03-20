@extends('layouts.home')
@section('content')
    
<div class="container">

    @foreach ($offers as $offer)
    
        <a href="{{action('FeaturesController@offersShow',$offer->id)}}">
        <div class="card d-flex flex-row mb-3">
        <div class="card-body">
            <h4 class="card-title">{{$offer->title}}</h4>
            <h5 class="card-text">{{$offer->text}}</h5>
        </a>
        {{-- <p class="card-text">Trader: <a href="{{action('UserController@show', $offer->user)}}">{{$offer->users['name']}}</a></p> --}}

            {{-- <div class="container d-flex flex-row">
                <form action="{{action('EventController@show', $event->id)}}" method="GET" class="ml-2">
                    @csrf
                    <input type="submit" value="Detail" class="btn btn-success">
                </form>
                @auth
                <form action="{{action('FeaturesController@attendEvent', $event->id)}}" method="POST" class="ml-2">
                    @csrf
                <input type="submit" class="btn btn-primary" value="Attend">
                </form> 
                @endauth
                @can('admin')
                <form action="{{action('EventController@edit', $event->id)}}" method="GET" class="ml-2">
                    @csrf
                    <input type="submit" value="Edit" class="btn btn-primary">
                </form>

                <form action="{{action('EventController@destroy', $event->id)}}" method="POST" class="ml-2">
                        @method('DELETE')
                        @csrf
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
                @endcan
            </div> --}}
            
        </div>
    </div>
  
    @endforeach

    {{$offers->onEachSide(1)->links()}}
</div>

@endsection