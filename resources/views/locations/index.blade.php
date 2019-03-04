@extends('layouts.home')

@section('content')

<div class="container">
        <!-- Content here -->
    <form method="GET" action="{{action('LocationController@create')}}">
            @csrf
    <input type="submit" value="Add a new game"></form><br>

            <div class="row">
                    <!-- col- elements here -->
                @foreach ($locations as $location)
                <div class="col-6">
                    <div class="card">
                            <img class="card-img-top" src="{{$location->image_url}}" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title">{{$location->name}}</h4>
                                <form method="GET" action="{{action('LocationController@show',$location->id)}}">
                                    @csrf
                                <input type="submit" value="Detail"></form>
                                <form method="POST" action="{{action('LocationController@destroy',$location->id)}}">
                                    @method('DELETE')
                                    @csrf
                                <input type="submit" value="Delete"></form>
                                <form method="GET" action="{{action('LocationController@edit',$location->id)}}">
                                    @csrf
                                <input type="submit" value="Edit"></form>
                            </div>
                        </div>
                    </div>          
                </div>
                
                @endforeach
                {{$locations->onEachSide(1)->links()}}
    </div>

</div>

@endsection