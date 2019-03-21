@extends('layouts.home')
@section('content')


<div class="sec-navbar">
    <form method="GET" action="{{action('LocationController@create')}}">
        @csrf
        <input type="submit" value="Add a new location" class="btn btn-sm btn-amber"></form>
    <div class="pagination pg-amber">{{$locations->onEachSide(1)->links()}}
    </div>
</div>

<div class="grid-container">

    @foreach ($locations as $location)
    <div class="card mb-3">
        <div class="view overlay">
                <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Boards%20and%20Brews&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>Google Maps Generator by <a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>
            <div class="mask rgba-indigo-strong"></div>
        </div>

        <div class="card-body">
            <h4 class="card-title">{{$location->name}}</h4>


            <div class="buttons-edit">
                <form method="GET" action="{{action('LocationController@show',$location->id)}}">
                    @csrf
                    <button type="submit" value="Detail" class="btn btn-icon btn-blue"><i class="fas fa-info"></i></button>
                </form>
                @can('admin')
                <form method="POST" action="{{action('LocationController@destroy',$location->id)}}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" value="Delete" class="btn btn-icon btn-red"><i class="fas fa-trash"></i></button></form>
                <form method="GET" action="{{action('LocationController@edit',$location->id)}}">
                    @csrf
                    <button type="submit" value="Edit" class="btn btn-icon btn-info"><i class="fas fa-pen"></i></button></form>
                @endcan
            </div>
        </div>
    </div>
    @endforeach


</div>

@endsection
