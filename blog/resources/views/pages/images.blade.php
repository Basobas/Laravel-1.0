@extends('layouts.app')

@section('content')
    <div class="imagePage_container">
        <div class="imagePageTitle">All images</div>
        <div class="image_container">
        @foreach ($images as $image)
            <div class="image">
                <div class = "image_title">
                   {{ $image->name }}
                </div>

                <div id="image_csgo">
                    <img src="{{url($image->image_url)}}" alt="{{$image->image_url}}" />
                </div>

                <div class="image_author">
                    {{ $image->author }}
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
