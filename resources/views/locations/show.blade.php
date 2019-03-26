@extends('layouts.home')
@section('content')

<div class="sec-navbar">
    <form method="GET" action="{{action('LocationController@index',$location->id)}}">
        @csrf
        <input type="submit" value="Back" class="btn btn-sm btn-amber"></form>
</div>

<div class="container location-detail">

    <h1 class="title">{{$location->name}}</h1>

    
        <div class="mapouter">
            <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="{{$location->image}}"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>Google Maps Generator by <a
                    href="https://www.embedgooglemap.net">embedgooglemap.net</a></div>

        </div>

        <div class="text">
            <h5>Description:{{$location->description}}</h5>
            <h5>Street: {{$location->street}}</h5>
            <h5>Zip Code: {{$location->zip_code}}</h5>
            <h5>City: {{$location->city}}</h5>
            <h5>Country: {{$location->country}}</h5>
            <h5>Web: <a href="{{$location->web}}" target="_blank">{{$location->web}}</a></h5>
            <p>Average Rating: {{$avgRating}}</p>

            <div class="rating">
                <form method="POST" action="{{action('LocationController@rating', $location->id)}}">
                    @csrf
                    <input type="radio" name="rating" value="1" id="rating-1" class="star star-1" /> <label
                        for="rating-1" title="text">1</label>
                    <input type="radio" name="rating" value="2" id="rating-2" /> <label for="rating-2"
                        title="text">2</label>
                    <input type="radio" name="rating" value="3" id="rating-3" /> <label for="rating-3"
                        title="text">3</label>
                    <input type="radio" name="rating" value="4" id="rating-4" /> <label for="rating-4"
                        title="text">4</label>
                    <input type="radio" name="rating" value="5" id="rating-5" /> <label for="rating-5"
                        title="text">5</label>
                    <button type="submit" value="Rate">Rate</button>
                </form>
            </div>

            @can('admin')
            <div class="buttons-edit">
                <form method="POST" action="{{action('LocationController@destroy',$location->id)}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" value="Delete" class="btn btn-icon btn-red"><i
                            class="fas fa-trash-alt"></i></button>
                </form>
                <form method="GET" action="{{action('LocationController@edit',$location->id)}}">
                    @csrf
                    <button type="submit" value="Edit" class="btn btn-icon btn-amber"><i
                            class="fas fa-pen-alt"></i></button>
                </form>
            </div>
            @endcan
        </div>
    


</div>

<div class="container">
        @auth
        <form action="{{action('CommentController@locationCommentStore', $location->id)}}" method="post">
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
        @foreach ($location->mainComments as $comment)
        @include('locations.comments')
        @endforeach
    </div>

@endsection
