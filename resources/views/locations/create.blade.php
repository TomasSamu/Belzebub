@extends('layouts.home')

@section('title', 'Add new Location')
{{-- @include('layouts.navigation') --}}
@section('content')



<form method="post" action="{{action('LocationController@store')}}">
    @csrf
    
    <div class="form-group">
        <label for="formGroupExampleInput">Title</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Name of the Location">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Short description of the locatiton</label>
        <input type="textfield" class="form-control" id="description" name="description" placeholder="Description of the Location">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Street Name:</label>
        <input type="text" class="form-control" id="min_players" name="street" placeholder="">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Zip Code:</label>
        <input type="text" class="form-control" id="max_players" name="zip_code" placeholder="">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">City:</label>
        <input type="text" class="form-control" id="age_range" name="city" placeholder="">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Country</label>
        <input type="text" class="form-control" id="play_time" name="country" placeholder="">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Image</label>
        <input type="text" class="form-control" id="image_url" name="image_url" placeholder="Url to the image" value="">
    </div>
    <div class="form-group">
        <input type="submit" class="form-control" value="Submit">
    </div>

</form>

@endsection