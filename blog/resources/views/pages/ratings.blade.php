<link href="{{ URL::asset('css/ratings.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="image_title">{{ $title }}</div>

    @if(!$ratingexist)
        <h3>There are no ratings for this image yet.</h3>
        @else

                <div class="ratings_container">

                    <div class="rating">
                        <div class="row1">
                            <div class="titel_user">Username</div>

                @foreach($usernames as $username)
                    <div class="usernames"> {{  $username  }}</div>
                @endforeach
                        </div>

                        <div class="row2">
                            <div class="titel_like">Rating</div>
                @foreach($ratings as $rating)
                    <div class="images">
                                @if($rating->like == 'like')
                                    <img class="image_likes" src="/imagesButtons/upGreen.png"/>


                                @else
                                    <img class="image_likes" src="/imagesButtons/downRed.png"/>
                                @endif

                        </div>

                @endforeach
                        </div>
            </div>

        </div>
        @endif
    </div>
@endsection
