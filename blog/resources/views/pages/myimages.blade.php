<link href="{{ URL::asset('css/myimages.css') }}" rel="stylesheet">
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="imagePage_container">
            <div class="imagePageTitle">My Images</div>
            <div class="image_container">
                @foreach ($images as $image)
                    <div class="image" id="{{$image->id}}">
                        <div class = "image_title">
                            <h4><b>Image title</b></h4><br>
                            {{ $image->name }}
                        </div>

                        <div id="image_csgo" >
                            <h4><b>Image</b></h4><br>
                            <img src="{{url($image->image_url)}}" alt="{{$image->image_url}}"/>
                        </div>
                        <div id="image_rating">
                            <h4><b>Rating</b></h4><br>
                            <img src="/imagesButtons/downRed.png"/>
                            <img src="/imagesButtons/upGreen.png"/>
                            <h4>{{ $image->likes }}</h4>

                        </div>
                        <div class="image_active" >
                            <h4><b>Active</b></h4><br>

                        </div>
                        <div class="image_date">
                            <h4><b>Date</b></h4><br>
                            <h4>{{ $image->created_at }}</h4>

                        </div>
                        <div class="image_edit">
                            <h4><b>Edit</b></h4><br>
                            <div class="editKnop"><a id ="editKnop"href="{{URL::to('image/edit/'.$image->id)}}">Edit</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
