@extends('layouts.home')
@section('content')
    
<div class="container">

    @foreach ($events as $event)

        <div class="card">
        <img class="card-img-top" src="/images/pathToYourImage.png" alt="Card image cap">
        <div class="card-body">
            <h4 class="card-title">{{$event->title}}</h4>
            <h5 class="card-text">{{$event->text}}</h5>
            <p class="card-text">{{$event->date}}</p>
            <p class="card-text">{{$event->time}}</p>

            <form action="{{action('EventController@edit', $event->id)}}" method="POST">
                <a href="edit/{{$event->id}}" class="btn btn-primary">Edit</a>
            </form>
             <form action="{{action('EventController@destroy', $event->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                <input type="submit" class="btn btn-danger" value="DELETE">
            </form>
            
        </div>
    </div>
  
    @endforeach

    {{$events->onEachSide(1)->links()}}
</div>

@endsection
