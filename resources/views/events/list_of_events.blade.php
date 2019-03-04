@extends('layouts.home')
@section('content')
    
<div class="container">

    @foreach ($events as $event)

        <div class="card d-flex flex-row mb-3">

            {{-- Pass to custom --}}
        <img class="card-img-top img-fluid" style= "object-fit: cover; width: 25em; height:15em" src="https://geekandsundry.com/wp-content/uploads/2016/06/BoardGameGS24.jpg" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title">{{$event->title}}</h4>
            <h5 class="card-text">{{$event->text}}</h5>
            <p class="card-text">{{$event->date}}</p>
            <p class="card-text">{{$event->time}}</p>

            <div class="container d-flex flex-row">
                <form action="{{action('EventController@edit', $event->id)}}" method="POST" class="ml-2">
                    <a href="edit/{{$event->id}}" class="btn btn-primary">Edit</a>
                </form>
                 <form action="{{action('EventController@destroy', $event->id)}}" method="POST" class="ml-2">
                        @csrf
                        @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </div>
            
        </div>
    </div>
  
    @endforeach

    {{$events->onEachSide(1)->links()}}
</div>

@endsection
