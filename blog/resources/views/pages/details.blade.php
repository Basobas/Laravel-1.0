<link href="{{ URL::asset('css/details.css') }}" rel="stylesheet">
@extends('layouts.app')

@section('content')
    <div class="container">

                <div class = "title">
                    <b>{{ $image->name }}</b>
                </div>

                <div id="image">
                    <img src="{{url($image->image_url)}}" alt="{{$image->image_url}}" /></a>
                </div>
                <div class="category">
                    <b>Category:</b> {{ $image->category }}
                </div>
                <div class="username">
                    <b>User:</b> {{ $image->author }}
                </div>

                <div class="description">
                    <b>Description:</b> <br>
                    {{ $image->details }}
                </div>
                <div class="titleLikes">
                    <b>Total Likes:</b>
                </div>

                <div class="likes">
                    <img src="/imagesButtons/downRed.png"/>
                    {{ $image->likes }}
                    <img src="/imagesButtons/upGreen.png"/>

                    <a href="{{URL::to('ratings/'.$image->id)}}">Show all ratings</a>
                </div>

    </div>

@endsection