@extends('layouts.home')

@section('content')


<div class="container">
    <div class="game-detail">
        <h3 class="title">{{$offer->title}}</h3>

        <img src="{{$offer->boardgame->image_url}}" class="img-fluid offers" />

        <div class="game-info text">

            <div class="lead">
                <h5>Time created: {{$offer->created_at}}</h5>
                <h5>Trader: <a href="{{action('UserController@show',$offer->user->id)}}">{{$offer->user->name}}</a></h5>
                <h5>Game on Offer: <a
                        href="{{action('BoardGameController@show',$offer->boardgame->id)}}">{{$offer->boardgame->name}}</a>
                </h5>

            </div>
        </div>
    </div>

    <div class="container">
        @auth
        <form action="{{action('CommentController@offerCommentStore', $offer->id)}}" method="post">
            @csrf
            <div class="form-group">
                <label for="text">Your comment:</label><br>
                <textarea name="text" id="comment" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" value="submit comment" class="btn btn-sm btn-amber">
            </div>
        </form>
        @endauth

        {{-- comment thread --}}
        @foreach ($offer->mainComments as $comment)
        @include('offers.comments')
        @endforeach

    </div>
</div>
</div>

@endsection
