@extends('layouts.home')
@section('content')

<div class="sec-navbar">
    <form method="GET" action="{{action('EventController@index',$event->id)}}">
        @csrf
        <input type="submit" value="Back" class="btn btn-sm btn-amber"></form>
</div>

<div class="container event-detail">
    <h1 class="title">{{$event->title}}</h1>
    <div class="event-info text">
        <div class="lead">
            <h5>Descriptions: {{$event->text}}</h5>
            <h5>Location: <a
                    href="{{action('LocationController@show',$event->location->id )}}">{{$event->location->name}}</a>
            </h5>
            <h5>Number of players: {{$event->num_of_players}}</h5>
            <h5>Date: {{$event->date}}</h5>
            <h5>Time: {{$event->time}}</h5>
            <h5>Organizer: <a href a
                    href="{{action('UserController@show', $created_by->id )}}">{{$created_by->name}}</a></h5>
            <h5>Average rating: {{$avgRating}}</h5>
        </div>

        <div class="rating">
                <form method="POST" action="{{action('EventController@rating', $event->id)}}">
                    @csrf
                    <input type="radio" name="rating" value="1" id="rating-1" class="star star-1" /> <label for="rating-1"
                        title="text">1</label>
                    <input type="radio" name="rating" value="2" id="rating-2" /> <label for="rating-2" title="text">2</label>
                    <input type="radio" name="rating" value="3" id="rating-3" /> <label for="rating-3" title="text">3</label>
                    <input type="radio" name="rating" value="4" id="rating-4" /> <label for="rating-4" title="text">4</label>
                    <input type="radio" name="rating" value="5" id="rating-5" /> <label for="rating-5" title="text">5</label>
                    <button type="submit" value="Rate">Rate</button>
                </form>
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
    </div>
</div>


<div class="container">
    @auth
    <form action="{{action('CommentController@eventCommentStore', $event->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label for="text">Your comment:</label><br>
            <textarea name="text" id="comment"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="submit comment" class="btn btn-sm btn-amber">
        </div>
    </form>
    @endauth

    {{-- comment thread --}}
    @foreach ($event->mainComments as $comment)
    @include('events.comments')
    @endforeach

</div>
