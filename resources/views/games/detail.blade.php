@extends('layouts.home')

@section('content')

<div class="sec-navbar">
    <form method="GET" action="{{action('BoardGameController@index',$game->id)}}">
        @csrf
        <input type="submit" value="Back" class="btn btn-sm btn-amber"></form>
</div>


<div class="container">
    <h1 class="title">{{$game->name}}</h1>
    <img src="{{$game->image_url}}" alt="image" class="CHANGETHIS">
    <div class="event-info">
        <p class="lead">
            <h5>Published: {{$game->year}}</h5>
            <h5>Number of players: {{$game->min_players}} - {{$game->max_players}}</h5>
            <h5>Age: {{$game->age_range}}</h5>
            <h5>Average playtime: {{$game->play_time}}</h5>
            <h5>Average Rating: {{$avgRating}}</h5>
            <p>Description: <br>{{$game->description}}</p>
            
        </p>
    </div>

    <div class="rating">
        <form method="POST" action="{{action('BoardGameController@rating', $game->id)}}">
                @csrf
                <input type="radio" name="rating" value="1" id="rating-1" class="star star-1" /> <label for="rating-1" title="text">1</label>
                <input type="radio" name="rating" value="2" id="rating-2" /> <label for="rating-2" title="text">2</label>
                <input type="radio" name="rating" value="3" id="rating-3" /> <label for="rating-3" title="text">3</label>
                <input type="radio" name="rating" value="4" id="rating-4" /> <label for="rating-4" title="text">4</label>
                <input type="radio" name="rating" value="5" id="rating-5" /> <label for="rating-5" title="text">5</label>
                <button type="submit" value="Rate">Rate</button>
        </form>
    </div>

    <div class="buttons-edit">
        @auth
        <form method="POST" action="{{action('BoardGameController@destroy',$game->id)}}">
            @method('DELETE')
            @csrf
            <button type="submit" value="Delete" class="btn btn-icon btn-red"><i class="fas fa-trash-alt"></i></button>
        </form>

        <form method="GET" action="{{action('BoardGameController@edit',$game->id)}}">
            @csrf
            <button type="submit" value="Edit" class="btn btn-icon btn-amber"><i class="fas fa-pen-alt"></i></button>
        </form>
        @endauth
    </div>


    @auth
    <form action="{{action('CommentController@gameCommentStore', $game->id)}}" method="post">
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

        {{-- comment thread --}}
        @foreach ($game->mainComments as $comment)
            @include('games.comments')
        @endforeach  

</div>

@endsection
