@extends('layouts.home')

@section('content')

<div class="container">

    <!-- New Event -->
    <form method="GET" action="{{action('LocationController@create')}}">
        @csrf
        <input type="submit" value="Add a new location"></form><br>

    {{-- Cards --}}

    <div class="card-deck mb-4">


        @foreach ($locations as $location)
        <div class="card col-6">
            <div class="view overlay">
                <img class="card-img-top" src="{{$location->image_url}}" alt="Card image cap" />
                <a href="#!">
                    <div class="mask rgba-indigo-strong"></div>
                </a>
            </div>

            <div class="card-body">
                <h4 class="card-title">{{$location->name}}</h4>


                <div class="buttons-edit">
                    <form method="GET" action="{{action('LocationController@show',$location->id)}}">
                        @csrf
                        <input type="submit" value="Detail" />
                    </form>
                    @can('admin')
                    <form method="POST" action="{{action('LocationController@destroy',$location->id)}}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Delete"></form>
                    <form method="GET" action="{{action('LocationController@edit',$location->id)}}">
                        @csrf
                        <input type="submit" value="Edit"></form>
                    @endcan
                </div>
            </div>
        </div>
        @endforeach




        {{$locations->onEachSide(1)->links()}}
    </div>

</div>

@endsection
