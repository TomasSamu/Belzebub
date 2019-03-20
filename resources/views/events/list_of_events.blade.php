@extends('layouts.home')
@section('content')

{{-- Create new Event --}}
<div class="sec-navbar d-flex flex-row justify-content-between pt-5 px-3 mt-3">
        <form action="{{action('EventController@create')}}" method="get">
                <input type="submit" value="Add a New Event" class="btn btn-amber">
            </form>
            <div class="pagination pg-amber">{{$events->onEachSide(1)->links()}}</div>
</div>

<div class="container">

    {{-- Cards --}}

    <div class="card-deck mb-4">
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
                        <input type="submit" value="Detail" class="btn btn-success btn-sm">
                    </form>
                    @auth
                    @if ($event->attendees()->count() < $event->num_of_players)
                        <form action="{{action('FeaturesController@attendEvent', $event->id)}}" method="POST" class="ml-2">
                            @csrf
                            <input type="submit" class="btn btn-primary btn-sm" value="Attend">
                        </form>
                        @endauth
                        @endif

                        @can('admin')
                        <form action="{{action('EventController@edit', $event->id)}}" method="GET" class="ml-2">
                            @csrf
                            <input type="submit" value="Edit" class="btn btn-sm btn-primary">
                        </form>

                        <form action="{{action('EventController@destroy', $event->id)}}" method="POST" class="ml-2">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                        </form>
                        @endcan
                </div>



            </div>
            </div>

            @endforeach

            {{$events->onEachSide(1)->links()}}
    </div>
</div>    

@endsection
