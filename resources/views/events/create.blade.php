{{-- {{dd($locations)}} --}}

@extends('layouts.home')
@section('content')

{{-- <head> --}}


{{-- </head> --}}
    <div class="container">

        <form method="post" action="{{ action('EventController@store') }}">

            @csrf

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>

             <div class="form-group">
                <label>Description</label>
                <input type="text" name="text" class="form-control">
            </div>

            <div class="form-group">
                <label>Number of players</label>
                <input type="text" name="num_of_players" class="form-control">
            </div>

{{--
            <div class="form-group">
                <label>Date</label>
                <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>
            </div>

            <div class="form-group">
                <label>Time</label>
                <input class="form-control" id="time" name="time" placeholder="HH:MM" type="text"/>
            </div> --}}

            <div class="form-group">
                <label>Location</label>
                <select name="location_id" class="form-control">
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

             <div class="form-group">
                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                        <input type="text" name="date_time" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div> 
                    </div>
            </div>
          

 
 
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection