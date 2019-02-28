{{-- {{dd($locations)}} --}}

@extends('layouts.app')
@section('content')
    <div class="container">

        <form method="post" action="{{ action('EventController@store') }}">

            @csrf

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label>Text</label>
                <input type="text" name="text" class="form-control">
            </div>

            <div class="form-group">
                <label>Number of players</label>
                <input type="text" name="num_of_players" class="form-control">
            </div>

            <div class="form-group">
                <label>Number of players</label>
                <input type="text" name="num_of_players" class="form-control">
            </div>


            <div class="form-group">
                <label>Location</label>
                <select name="location_id" class="form-control">
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>
            
{{--             <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker1').datetimepicker();
                });
            </script> --}}

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection