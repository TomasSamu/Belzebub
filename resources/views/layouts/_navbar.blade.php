@include('layouts.alerts')

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="{{action('HomeController@welcome')}}">Board Game Project</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

        </ul>
        <!--maybe if else authentification somewhere here -->

        <ul class="navbar-nav  ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('profile') }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ action('UserController@index') }}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('events/list') }}">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ action('BoardGameController@index') }}">Games</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ action('LocationController@index') }}">Locations</a>
            </li>
        </ul>
    </div>
</nav>
