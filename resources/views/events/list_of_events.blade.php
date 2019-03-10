@extends('layouts.home')
@section('content')
    
<div class="container">

<form action="{{action('EventController@create')}}" method="get">
    <input type="submit" class= "btn btn-primary" value="Create New Event">
</form>

    @foreach ($events as $event)
    

        <div class="card d-flex flex-row mb-3">

            {{-- Pass to custom --}}
        <img class="card-img-top img-fluid" style= "object-fit: cover; width: 25em; height:15em" src="https://geekandsundry.com/wp-content/uploads/2016/06/BoardGameGS24.jpg" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title">{{$event->title}}</h4>
            <h5 class="card-text">{{$event->text}}</h5>
            <p class="card-text">Date: {{$event->date}}</p>
            <p class="card-text">Time: {{$event->time}}</p>
        <p class="card-text">Organizer: <a href="{{action('UserController@show', $event->user_id)}}">{{$event->users['name']}}</a></p>

            <div class="container d-flex flex-row">
                <form action="{{action('EventController@show', $event->id)}}" method="GET" class="ml-2">
                    @csrf
                    <input type="submit" value="Detail" class="btn btn-success">
                </form>
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
            </div>
            
        </div>
    </div>
  
    @endforeach

    {{$events->onEachSide(1)->links()}}
</div>

@endsection
