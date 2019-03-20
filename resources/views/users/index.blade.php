@extends('layouts.home')

@section('content')

<div class="sec-navbar d-flex flex-row justify-content-between pt-5 px-3 mt-3">
    <h1>Users</h1>
</div>

<div class="container">
    <div class="row">

        @foreach ($users as $user)
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
            {{-- pass to custom --}}

            <div class="card m-2 p-2 shadow mb-4 bg-white rounded">


                <img class="card-img-top rounded-circle img-fluid user-img-circle" src="{{$user->image}}" alt="Card image cap" />


                <div class="card-body user-card-body">
                    <h5 class="card-title">{{ $user->name}}</h5>
                    <h6 class="card-text text-muted">{{ $user->city}}</h6>
                    <p class="card-text h-6">{{ $user->gender}}</p>
                    <p class="card-text h-6">This is a short introduction of the user.</p>

                    <div class="buttons-edit">
                        <form method="GET" action="{{action('UserController@show',$user->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-icon btn-info" value="Detail"><i class="fas fa-info"></i></button></form>
                        @can('admin')
                        <form method="POST" action="{{action('UserController@destroy',$user->id)}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-icon btn-red" value="Delete"><i class="far fa-trash-alt"></i></button></form>
                        <form method="GET" action="{{action('UserController@edit',$user->id)}}">
                            @csrf
                            <button type="submit" class="btn btn-icon btn-amber" value="Edit"><i class="fas fa-pen"></i></button></form>
                        @endcan
                    </div>

                </div>



            </div>
        </div>

        @endforeach
    </div>
</div>

@endsection
