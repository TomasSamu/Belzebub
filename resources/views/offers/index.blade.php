@extends('layouts.home')
@section('content')

<div class="sec-navbar">
    <h2>Offers</h2>
            {{$offers->onEachSide(1)->links()}}
</div>



<div class="container offers-cont">
    <div class="grid-container">
    
        @foreach ($offers as $offer)
        <div class="card">
                <div class="card-body">
                    <img src="{{action('BoardGameController@show',$offer->boardgame->image_url)}}" />
                    <h4 class="card-title">{{$offer->title}}</h4>
                    <h5 class="card-text">{{$offer->text}}</h5>
                    
         <a href="{{action('FeaturesController@offersShow',$offer->id)}}">
                More info...
            </a>
        
                </div>
        </div>
    
    @endforeach
    
    </div>
</div>
@endsection

