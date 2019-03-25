@extends('layouts.home')
@section('content')


<div class="sec-navbar">
    <form method="GET" action="{{action('LocationController@create')}}">
        @csrf
        <input type="submit" value="Add a new location" class="btn btn-sm btn-amber"></form>
        <h2 class="title-bar">Locations</h2>
    <div class="pagination pg-amber">{{$locations->onEachSide(1)->links()}}
    </div>
</div>

<div class="grid-container">

    @foreach ($locations as $location)
    <div class="card">
        <div class="view overlay">

            <img class="card-img-top" src="{{$location->image_url}}" alt="Card image cap" />
            <div class="mask rgba-indigo-strong">
            </div>
        </div>

        <div class="card-body">
            <h4 class="card-title">{{$location->name}}</h4>
            <p>Average Rating: {{round($location->ratings()->avg('rating'), 2)}} </p>

            <div class="buttons-edit">
                <form method="GET" action="{{action('LocationController@show',$location->id)}}">
                    @csrf
                    <button type="submit" value="Detail" class="btn btn-icon btn-blue"><i
                            class="fas fa-info"></i></button>
                </form>
                @can('admin')
                <form method="POST" action="{{action('LocationController@destroy',$location->id)}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" value="Delete" class="btn btn-icon btn-red"><i
                            class="fas fa-trash"></i></button></form>
                <form method="GET" action="{{action('LocationController@edit',$location->id)}}">
                    @csrf
                    <button type="submit" value="Edit" class="btn btn-icon btn-info"><i class="fas fa-pen"></i></button>
                </form>
                @endcan
            </div>
        </div>
    </div>
    @endforeach


</div>

@endsection
