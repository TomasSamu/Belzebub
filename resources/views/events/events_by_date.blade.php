@extends('layouts.home')
@section('content')

{{-- Create new Event --}}
<div class="sec-navbar">

    <form action="{{action('EventController@eventsByDate')}}" method="get">
            <div class="input-group date" id="datetimepicker4" data-target-input="nearest">          
                <input type="text" name="dateFilter" class="form-control datetimepicker-input" data-target="#datetimepicker4"/>
                <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <button type="submit" class="btn btn-sm btn-amber"> Search by date</button>
            </div>
    </form>

{{--     <form action="{{action('EventController@eventsByLocation')}}" method="get">
            <div class="form-group">
                    <select name="location_id" class="form-control">
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                    
                </div>  
                <button type="submit" class="btn btn-sm btn-amber"> Search by Location</button>  
        </form> --}}

    {{-- <div class="pagination pg-amber">{{$events->onEachSide(1)->links()}}</div> --}}
</div>

<h2>Events happening on: {{$date}}</h2>
<div class="grid-container">

    {{-- Cards --}}

        @foreach ($events as $event)

        {{-- class="col-lg-6 col-md-6 col-sm-4 col-xs-4"> --}}

        {{-- Pass to custom --}}
        {{-- or imgfluid in scss --}}

        <div class="card">
            <div class="view overlay">
                <img class="card-img-top img-fluid" src="https://geekandsundry.com/wp-content/uploads/2016/06/BoardGameGS24.jpg"
                    alt="Card image cap" />
                <div class="mask flex-center rgba-blue-slight">
                    {{-- Not working --}}
                </div>
            </div>


            <div class="card-body">
                <h5 class="card-title">{{$event->title}}</h5>
                <h6 class="card-text">{{$event->text}}</h6>
                <p class="card-text">Venue: <a href="{{action('LocationController@show', $event->location_id)}}">
                    {{$event->location->name}}</a></p>
                <p class="card-text">Date: {{$event->date}}</p>
                <p class="card-text">Time: {{$event->time}}</p>
                
                <p class="card-text">Organizer: <a href="{{action('UserController@show', $event->user_id)}}">{{$event->users['name']}}</a></p>

                @if ($event->attendees()->count() == $event->num_of_players)
                <p class="card-text">Number of Attendees: {{$event->attendees()->count()}} (the event is full)</p>
                @else
                <p class="card-text">Number of Attendees: {{$event->attendees()->count()}}</p>
                @endif


                <div class="d-flex flex-row">
                    <form action="{{action('EventController@show', $event->id)}}" method="GET" class="ml-2">
                        @csrf
                        <button type="submit" value="Detail" class="btn btn-success btn-icon"><i class="fas fa-info"></i></button>
                    </form>
                    @auth
                    @if ($event->attendees()->count() < $event->num_of_players)
                        <form action="{{action('FeaturesController@attendEvent', $event->id)}}" method="POST" class="ml-2">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-icon" value="Attend"><i class="fas fa-user-check"></i></button>
                        </form>
                        @endauth
                        @endif

                        @can('admin')
                        <form action="{{action('EventController@edit', $event->id)}}" method="GET" class="ml-2">
                            @csrf
                            <button type="submit" value="Edit" class="btn btn-icon btn-primary"><i class="fas fa-pen"></i></button>
                        </form>

                        <form action="{{action('EventController@destroy', $event->id)}}" method="POST" class="ml-2">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-icon" value="Delete"><i class="far fa-trash-alt"></i></button>
                        </form>
                        @endcan
                </div>



            </div>
        </div>

        @endforeach

</div>

@endsection