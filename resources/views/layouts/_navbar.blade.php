<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Board Game Project</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav  ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('users') }}">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('profile') }}">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('events/list') }}">Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('games/list') }}">Games</a>
        </li>
      </ul>
    </div>
  </nav>