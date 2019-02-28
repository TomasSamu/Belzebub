{{-- {{dd($locations)}} --}}

@extends('layouts.home')
@section('content')

{{-- <head> --}}

{{-- ************date picker thingie ****** but doesnt work for some strange reason ****************
    <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href="./css/prettify-1.0.css" rel="stylesheet">
<link href="./css/base.css" rel="stylesheet">
<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
 --}}
{{-- </head> --}}
    <div class="container">

        <form method="post" action="{{ action('EventController@store') }}">

            @csrf

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="form-group">
                <label>User</label>
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{$user->id}}"> {{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" name="text" class="form-control">
            </div>

            <div class="form-group">
                <label>Number of players</label>
                <input type="text" name="num_of_players" class="form-control">
            </div>

            <div class="form-group">
                <label>Date</label>
                <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text"/>
            </div>

            <div class="form-group">
                <label>Time</label>
                <input class="form-control" id="time" name="time" placeholder="HH:MM" type="text"/>
            </div>

            <div class="form-group">
                <label>Location</label>
                <select name="location_id" class="form-control">
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>








{{-- ******** datepicker - doesnt work for some reason-- ***********}}

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
            </script>

 --}}
 
 <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection