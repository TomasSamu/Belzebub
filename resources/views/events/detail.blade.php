@extends('layouts.home')

@section('content')

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3">{{$event->title}}</h1>
        <p class="lead">
            <h5>text: {{$event->text}}</h5>
            <h5>Number of players: {{$event->num_of_players}}</h5>
            <h5>Date: {{$event->date}}</h5>
            <h5>Time: {{$event->time}}</h5>
            <h5>Organizer: {{$created_by->name}}</h5>
            <h5>Attendees:</h5>
             </ul>
                @foreach ($event->attendees as $attendee)
                    <li>{{$attendee->name}}</li>
                @endforeach
            </ul> 
        </p>
        <form method="GET" action="{{action('EventController@index',$event->id)}}">
                @csrf
        <input type="submit" value="Back"></form>
        <form method="POST" action="{{action('EventController@destroy',$event->id)}}">
                @method('DELETE')
                @csrf
        <input type="submit" value="Delete"></form>
        <form method="GET" action="{{action('EventController@edit',$event->id)}}">
                @csrf
        <input type="submit" value="Edit"></form>
    </div>`

    <div class="container">

        @foreach ($event->comments as $comment)
            @auth
            <form action="{{action('CommentController@store', $event->id)}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="text">Your answer:</label><br>
                    <textarea name="text" id="comment" cols="50" rows="5"></textarea>
                    <input type="hidden" value="{{$event->id}}">
                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                </div>
            
                <div class="form-group">
                    <input type="submit" value="submit comment">
                </div>
            </form>
            @endauth

            <div class="comment">   
                <div class="comment-left">
                    <div class="user-avatar">
                        <img class="img-fluid"
                            src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png"/>
                    </div>
                    <div class="user-name">{{ $comment->user->name }}</div>
                </div>
                <div class="comment-right">
                    {{ $comment->text }}
                </div>
            </div>
        @endforeach
        </div>
</div>

@endsection