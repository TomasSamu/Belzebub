@extends ('layouts.home')


@section('content')
        
        <div class="container-fluid logotag">
            <h1>Our logo<br>
            and tagline.</h1>
        </div>

        <a href="{{ action('EventController@index') }}">
            <div class="container-fluid welcome section_events">
                <h2 class="title_welcome">Events</h2><br>
                <h3 class="subtitle_welcome">Find local gaming events and the best venues to play.</h3>
            </div>
        </a>

        <a href="{{ action('FeaturesController@offersIndex') }}">
            <div class="container-fluid welcome section_games">
                <h2 class="title_welcome">Game trading</h2><br>
                <h3 class="subtitle_welcome">Browse games available for trading from local gamers.</h3>
            </div>
        </a>
        <a href="{{ action('UserController@index') }}">
            <div class="container-fluid welcome section_connect">
                <h2 class="title_welcome">Connect</h2><br>
                <h3 class="subtitle_welcome">Connect with like-minded people around you and browse their game collection.</h3>
            </div>
        </a>

@include('users.users_login')            

@endsection