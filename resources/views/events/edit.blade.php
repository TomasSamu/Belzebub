{{-- {{dd($locations)}} --}}
{{-- Implement the data picker. See code at the bottom --}}
@extends('layouts.home')
@section('content')


<div class="sec-navbar">
    <form method="GET" action="{{action('EventController@index',$event->id)}}">
        @csrf
        <input type="submit" value="Back" class="btn btn-sm btn-amber"></form>
</div>

<div class="container">

    <form method="POST" action="{{ action('EventController@update', $event->id )}}">

        @csrf
        {{ method_field('PUT') }}

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{$event->title}}">
        </div>

        <div class="form-group">
            <label>Description</label>
            <input type="text" name="text" class="form-control" value="{{$event->text}}">
        </div>

        <div class="form-group">
            <label>Number of players</label>
            <input type="text" name="num_of_players" class="form-control" value="{{$event->num_of_players}}">
        </div>

        <div class="form-group">
            <label>Date</label>
            <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text"
                value="{{$event->date}}" />
        </div>

        <div class="form-group">
            <label>Time</label>
            <input class="form-control" id="time" name="time" placeholder="HH:MM" type="text"
                value="{{$event->time}}" />
        </div>

        {{-- implement pre selected feature for the current location option --}}
        <div class="form-group">
            <label>Location</label>
            <select name="location_id" class="form-control">
                @foreach($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
