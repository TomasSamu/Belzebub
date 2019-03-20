@extends('layouts.home')

@section('content')
<!-- New Event -->
<div class="sec-navbar d-flex flex-row justify-content-between pt-5 px-3 mt-3">
    <form method="GET" action="{{action('LocationController@create')}}">
        @csrf
        <input type="submit" value="Add a new location" class="btn btn-amber"></form><br>
</div>

<div class="container">



    {{-- Cards --}}

    <div class="card-deck mb-4">


        @foreach ($locations as $location)
        <div class="card col-6">
            <div class="view overlay">
                <img class="card-img-top" src="{{$location->image_url}}" alt="Card image cap" />
                <div class="mask rgba-indigo-strong"></div>
            </div>

            <div class="card-body">
                <h4 class="card-title">{{$location->name}}</h4>


                <div class="buttons-edit">
                    <form method="GET" action="{{action('LocationController@show',$location->id)}}">
                        @csrf
                        <input type="submit" value="Detail" class="btn btn-sm btn-blue" />
                    </form>
                    @can('admin')
                    <form method="POST" action="{{action('LocationController@destroy',$location->id)}}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Delete" class="btn btn-sm btn-red"></form>
                    <form method="GET" action="{{action('LocationController@edit',$location->id)}}">
                        @csrf
                        <input type="submit" value="Edit" class="btn btn-sm btn-info"></form>
                    @endcan
                </div>
            </div>
        </div>
        @endforeach




        {{$locations->onEachSide(1)->links()}}
    </div>

</div>

@endsection
