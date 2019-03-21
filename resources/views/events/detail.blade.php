@extends('layouts.home')
@section('content')

<div class="sec-navbar d-flex flex-row justify-content-between pt-5 px-3 mt-3">
        <form method="GET" action="{{action('EventController@index',$event->id)}}">
                @csrf
                <input type="submit" value="Back" class="btn btn-sm btn-blue"></form>
    </div>
        
        <div class="container">
            <h1>{{$event->title}}</h1>
            <div class="event-info">
                <div class="lead">
                    <h5>Descriptions: {{$event->text}}</h5>
                    {{-- <h5>Location: {{$location->name}}</h5> --}} 
                    <h5>Number of players: {{$event->num_of_players}}</h5>
                    <h5>Date: {{$event->date}}</h5>
                    <h5>Time: {{$event->time}}</h5>
                    <h5>Organizer: {{$created_by->name}}</h5>
                    <h5>Attendees:</h5>
                </div>

                <div class="buttons-edit">
                        <form method="POST" action="{{action('EventController@destroy',$event->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" value="Delete" class="btn btn-icon btn-red"><i
                            class="fas fa-trash-alt"></i></button></form>
                        <form method="GET" action="{{action('EventController@edit',$event->id)}}">
                            @csrf
                            <button type="submit" value="Edit" class="btn btn-icon btn-amber"><i
                                class="fas fa-pen-alt"></i></button></form>
                    </div>

                <div class="grid-container">
                        @foreach ($event->attendees as $attendee)
                        <div class="attendee">
                            <p>{{$attendee->name}}</p>
                            <p><img src="{{$attendee->image}}" alt="image" class="rounded-circle"></p>
                        </div>
                        @endforeach
                </div>
            </div>
    
            
        </div>
    
        <div class="container">
            @auth
            <form action="{{action('CommentController@store', $event->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="text">Your comment:</label><br>
                    <textarea name="text" id="comment" cols="50" rows="5"></textarea>
                </div>
    
                <div class="form-group">
                    <input type="submit" value="submit comment">
                </div>
            </form>
            @endauth

            
            @foreach ($event->mainComments as $comment)
                @include('events.comments')
            @endforeach 

        </div>
</div>
        </div>
    
{{--         @foreach ($event->comments as $comment)
    
        <div class="comment">
            <div class="comment-left">
                <div class="user-avatar">
                    <img class="img-fluid"
                        src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png" />
                </div>
                <div class="user-name">{{ $comment->user->name }}</div>
            </div>
            <div class="comment-right">
                {{ $comment->text }}
            </div>
        </div>
        @endforeach --}}

@endsection
