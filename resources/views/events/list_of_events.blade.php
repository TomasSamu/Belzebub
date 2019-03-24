@extends('layouts.home')
@section('content')

{{-- Create new Event --}}
<div class="sec-navbar">
    <form action="{{action('EventController@create')}}" method="get">
        <button type="submit" class="btn btn-sm btn-amber d-none d-sm-block">Add an event</button>
        <button type="submit" class="btn btn-xs btn-amber d-none d-block d-sm-none"><i class="fas fa-plus"></i></button>
    </form>

    <h2 class="title-bar">Events</h2>

@include('layouts._searchbar_events')

<div class="pagination pg-amber">{{$events->onEachSide(1)->links()}}</div>
</div>

{{-- filter events by date --}}
{{--  <div class="container eventSelector">  
            <div class="form-group">
                <form action="{{action('FeaturesController@eventsByDate')}}" method="get">
@csrf
<div class="input-group date" id="datetimepicker4" data-target-input="nearest">
    <input type="text" name="dateFilter" class="form-control datetimepicker-input" data-target="#datetimepicker4" />
    <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
    </div>

</div>
<button type="submit" class='bth btn-primary'> Submit </button>
</form>
</div>

</div> --}}
<h2>List of all events</h2>

<div class="grid-container">


    {{-- Cards --}}

    @foreach ($events as $event)

    <div class="card">
        <div class="view overlay">
            <img class="card-img-top img-fluid"
                src="https://geekandsundry.com/wp-content/uploads/2016/06/BoardGameGS24.jpg" alt="Card image cap" />
            <div class="mask flex-center rgba-blue-slight">
            </div>
        </div>


        <div class="card-body">
            <h5 class="card-title">{{$event->title}}</h5>
            <h6 class="card-text">{{$event->text}}</h6>
            <p class="card-text">Venue: <a href="{{action('LocationController@show', $event->location_id)}}">
                    {{$event->location->name}}</a></p>
            <p class="card-text">Date: {{$event->date}}</p>
            <p class="card-text">Time: {{$event->time}}</p>

            <p class="card-text">Organizer: <a
                    href="{{action('UserController@show', $event->user_id)}}">{{$event->users['name']}}</a></p>

            @if ($event->attendees()->count() == $event->num_of_players)
            <p class="card-text">Number of Attendees: {{$event->attendees()->count()}} (the event is full)</p>
            @else
            <p class="card-text">Number of Attendees: {{$event->attendees()->count()}}</p>
            @endif


            <div class="buttons-edit">
                <form action=" {{action('EventController@show', $event->id)}}" method="GET" class="ml-2">
                    @csrf
                    <button type="submit" value="Detail" class="btn btn-success btn-icon"><i
                            class="fas fa-info"></i></button>
                </form>
                @auth
                @if ($event->attendees()->count() < $event->num_of_players)
                    <form action="{{action('FeaturesController@attendEvent', $event->id)}}" method="POST" class="ml-2">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-icon" value="Attend"><i
                                class="fas fa-user-check"></i></button>
                    </form>
                    @endauth
                    @endif

                    @can('admin')
                    <form action="{{action('EventController@edit', $event->id)}}" method="GET" class="ml-2">
                        @csrf
                        <button type="submit" value="Edit" class="btn btn-icon btn-primary"><i
                                class="fas fa-pen"></i></button>
                    </form>

                    <form action="{{action('EventController@destroy', $event->id)}}" method="POST" class="ml-2">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-icon" value="Delete"><i
                                class="far fa-trash-alt"></i></button>
                    </form>
                    @endcan
            </div>



        </div>
    </div>

    @endforeach

</div>

@endsection
