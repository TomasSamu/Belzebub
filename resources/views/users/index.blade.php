@extends('layouts.home')


@section('content')

    <h1>Users</h1>

        <div class="card-deck">
                @foreach ($users as $user)

                {{-- pass to custom --}}
            <div class="card m-3 p-2" style="width: 8rem;">
              <img class="card-img-top" src="https://avataaars.io/?avatarStyle=Circle&topType=LongHairStraight&accessoriesType=Blank&hairColor=BrownDark&facialHairType=Blank&clotheType=BlazerShirt&eyeType=Default&eyebrowType=Default&mouthType=Default&skinColor=Light/5em" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{ $user->name}}</h5>
                <h6 class="card-text">{{ $user->gender}}</h6>
                <h5 class="card-text text-muted">{{ $user->city}}</h5>
                <p class="card-text h-6">This is a short introduction of the user.</p>
              </div>
            </div>
            @endforeach
        </div>

@endsection       