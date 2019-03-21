@extends('layouts.home')
@section('content')

<div class="sec-navbar">
    <form method="GET" action="{{action('LocationController@index',$location->id)}}">
        @csrf
        <input type="submit" value="Back" class="btn btn-sm btn-blue"></form>
</div>



<div class="container">

    <form method="POST" action="{{action('LocationController@update', $location->id)}}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Title</label>
            <input type="text" class="form-control" name="name" id="name" value="{{$location->name}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Short description of the locatiton</label>
            <input type="textfield" class="form-control" id="description" name="description"
                value="{{$location->description}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Street Name:</label>
            <input type="text" class="form-control" id="min_players" name="street" value="{{$location->street}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Zip Code:</label>
            <input type="text" class="form-control" id="max_players" name="zip_code" value="{{$location->zip_code}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">City:</label>
            <input type="text" class="form-control" id="age_range" name="city" value="{{$location->city}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Country</label>
            <input type="text" class="form-control" id="play_time" name="country" value="{{$location->country}}">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput2">Image</label>
            <input type="text" class="form-control" id="image_url" name="image_url" value="{{$location->image_url}}">
        </div>
        <div class="form-group">
            <input type="submit" value="Update" class="btn btn-sm btn-amber">
        </div>

    </form>
</div>

@endsection
