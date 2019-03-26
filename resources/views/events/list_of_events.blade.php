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


</div>
<div class="container">
    
    {{-- top rated events --}}
    <h2>Top 3 rated events: </h2>
    <div class="grid-container">
        
      @foreach ($topEvents as $event)
        
            <div class="card">
                {{-- <div class="view overlay">
                    <img class="card-img-top img-fluid"
                        src="https://geekandsundry.com/wp-content/uploads/2016/06/BoardGameGS24.jpg" alt="Card image cap" />
                    <div class="mask flex-center rgba-blue-slight">
                    </div>
                </div>
        
         --}}
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
                    <p>Average Rating: {{round($event->ratings()->avg('rating'), 2)}} </p>
                    @endif
        
                    <div class="buttons-edit">
                        @auth
                        <form action=" {{action('EventController@show', $event->id)}}" method="GET" class="ml-2">
                            @csrf
                            <button type="submit" value="Detail" class="btn btn-success btn-icon"><i
                                    class="fas fa-info"></i></button>
                        </form>
        
                        @if ($event->attendees()->count() < $event->num_of_players)
                            <form action="{{action('FeaturesController@attendEvent', $event->id)}}" method="POST" class="ml-2">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-icon" value="Attend"><i
                                        class="fas fa-user-check"></i></button>
                            </form>
                            
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
                            @endauth
        
                            @guest
                             <p>Login to see details</p>   
                            @endguest
                    </div> 
        
                </div>
            </div>
        
            @endforeach
        
        </div> 
    
    
    {{-- all events in ascending order --}}
    <h2>Events coming up...</h2>
    
    <div class="grid-container">
    
        {{-- Cards --}}
    
        @foreach ($events as $event)
    
        {{-- average Rating per event query --}}
    
        <div class="card">
            {{-- <div class="view overlay">
                <img class="card-img-top img-fluid"
                    src="https://geekandsundry.com/wp-content/uploads/2016/06/BoardGameGS24.jpg" alt="Card image cap" />
                <div class="mask flex-center rgba-blue-slight">
                </div>
            </div> --}}
    
    
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
                <p>Average Rating: {{round($event->ratings()->avg('rating'), 2)}}</p>
                @endif
    
    
                <div class="buttons-edit">
                    @auth
                    <form action=" {{action('EventController@show', $event->id)}}" method="GET" class="ml-2">
                        @csrf
                        <button type="submit" value="Detail" class="btn btn-success btn-icon"><i
                                class="fas fa-info"></i></button>
                    </form>
    
                    @if ($event->attendees()->count() < $event->num_of_players)
                        <form action="{{action('FeaturesController@attendEvent', $event->id)}}" method="POST" class="ml-2">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-icon" value="Attend"><i
                                    class="fas fa-user-check"></i></button>
                        </form>
                        
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
                        @endauth
    
                        @guest
                         <p>Login to see details</p>   
                        @endguest
                </div>
    
    
    
            </div>
        </div>
    
        @endforeach
    
    </div>
    
    <div class="pagination pg-amber">{{$events->onEachSide(1)->links()}}</div>
</div>

@endsection
