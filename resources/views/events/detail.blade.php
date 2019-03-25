@extends('layouts.home')
@section('content')

<div class="sec-navbar">
    <form method="GET" action="{{action('EventController@index',$event->id)}}">
        @csrf
        <input type="submit" value="Back" class="btn btn-sm btn-blue"></form>
</div>

<div class="container">
    <h1>{{$event->title}}</h1>
    <div class="event-info">
        <div class="lead">
            <h5>Descriptions: {{$event->text}}</h5>
            <h5>Location: <a href="{{action('LocationController@show',$event->location->id )}}">{{$event->location->name}}</a></h5>
            <h5>Number of players: {{$event->num_of_players}}</h5>
            <h5>Date: {{$event->date}}</h5>
            <h5>Time: {{$event->time}}</h5>
            <h5>Organizer: <a href a href="{{action('UserController@show', $created_by->id )}}">{{$created_by->name}}</a></h5>
            <h5>Average rating: {{$avgRating}}</h5>
        </div>
    </div>


    <div class="buttons-edit">
        <form action="{{action('FeaturesController@attendEvent', $event->id)}}" method="POST" class="ml-2">
            @csrf
            <button type="submit" class="btn btn-primary btn-icon" value="Attend"><i
                    class="fas fa-user-check"></i></button>
        </form>

        @if (Auth::id() == $event->user_id || $isAdmin->is_admin)
            <form method="POST" action="{{action('EventController@destroy',$event->id)}}">
                @method('DELETE')
                @csrf
                <button type="submit" value="Delete" class="btn btn-icon btn-red"><i class="fas fa-trash-alt"></i></button>
            </form>
            <form method="GET" action="{{action('EventController@edit',$event->id)}}">
                @csrf
                <button type="submit" value="Edit" class="btn btn-icon btn-amber"><i class="fas fa-pen-alt"></i></button>
            </form>
        @endif

    </div>
    <form method="POST" action="{{action('EventController@rating', $event->id)}}">
            @csrf
            <input type="radio" name="rating" value="1" class="btn btn-icon btn-amber" /> <span>1</span>
            <input type="radio" name="rating" value="2" class="btn btn-icon btn-amber" /> <span>2</span>
            <input type="radio" name="rating" value="3" class="btn btn-icon btn-amber" /> <span>3</span>
            <input type="radio" name="rating" value="4" class="btn btn-icon btn-amber" /> <span>4</span>
            <input type="radio" name="rating" value="5" class="btn btn-icon btn-amber" /> <span>5</span>
            <button type="submit" value="Rate">Rate</button>
    </form>

    <div class="container">
        <h5>Attendees:</h5>
        <div class="grid-container">
            @foreach ($event->attendees as $attendee)
            <div class="attendee">
                <p>{{$attendee->name}}</p>
                <p><img src="{{$attendee->image}}" alt="image" class="rounded-circle"></p>
            </div>
            @endforeach


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
                    <input type="submit" value="submit comment" class="btn btn-sm btn-amber">
                </div>
            </form>
            @endauth


            @foreach ($event->mainComments as $comment)
            @include('events.comments')
            @endforeach

        </div>
    </div>
</div>
