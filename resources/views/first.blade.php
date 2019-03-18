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

            <div class="container-fluid welcome section_games">
                <h2 class="title_welcome">Game trading</h2><br>
                <h3 class="subtitle_welcome">Browse games available for trading from local gamers.</h3>
            </div>

        <a href="{{ action('UserController@index') }}">
            <div class="container-fluid welcome section_connect">
                <h2 class="title_welcome">Connect</h2><br>
                <h3 class="subtitle_welcome">Connect with like-minded people around you and browse their game collection.</h3>
            </div>
        </a>

            <div class="container-fluid welcome section_login d-flex flex-column">
                    <div class="text">
                        <h2 class="title_welcome">Log in or Register</h2><br>
                        <h3 class="subtitle_welcome">We would like you to register in order to access all our features.</h3>
                    </div>

                    <div class="form_fields m-5">
                            <form method="POST" action="{{ route('register') }}">
                                    @csrf
            
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            
                                        <div class="col-md-4">
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
            
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            
                                        <div class="col-md-4">
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
            
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            
                                        <div class="col-md-4">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
            
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            
                                        <div class="col-md-4">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
            
                                    <div class="form-group row mb-0 d-flex flex-row text-center">
                                        <div class="col-md-4 offset-md-4">
                                            <button type="submit" class="btn btn-primary mr-3">
                                                {{ __('Register') }}
                                            </button>
                                     
                                        
                                                <button type="button" class="btn btn-warning mr-3">
                                                    <a href="{{ route('login') }}">Login</a>
                                                </button>
                                            </div>
                                    </div>
                                </form>
                    
                            
                                        
                    </div>
            </div>


@endsection