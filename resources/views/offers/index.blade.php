@extends('layouts.home')
@section('content')

<div class="sec-navbar d-flex flex-row justify-content-between pt-5 px-3 mt-3">
            {{$offers->onEachSide(1)->links()}}
</div>



<div class="grid-container">

    @foreach ($offers as $offer)
    <div class="card d-flex flex-row mb-3">
            <div class="card-body">
                <img src="{{action('BoardGameController@show',$offer->boardgame->image_url)}}" />
                <h4 class="card-title">{{$offer->title}}</h4>
                <h5 class="card-text">{{$offer->text}}</h5>
                
    <a href="{{action('FeaturesController@offersShow',$offer->id)}}">
            More info...
        </a>
    
            </div>
    </div>

@endforeach

</div>
@endsection

{{-- <p class="card-text">Trader: <a href="{{action('UserController@show', $offer->user)}}">{{$offer->users['name']}}</a>
</p> --}}

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
