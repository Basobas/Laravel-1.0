<link href="{{ URL::asset('css/home.css') }}" rel="stylesheet">
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

            @if(Auth::guest())
            <div class="image_container">
                @foreach ($images as $image)
                    <div class="image" id="{{$image->id}}">
                        <div class = "image_title">
                            {{ $image->name}}
                        </div>

                        <div id="image_csgo" >
                            <img src="{{url($image->image_url)}}" alt="{{$image->image_url}}" />
                        </div>
                    </div>
                @endforeach
            </div>

                @else
            <div class="image_container">
                @foreach ($abstracts as $abstract)
                    <div class="image" id="{{$abstract->id}}">
                        <div class = "image_title">
                            {{ $abstract->name}}
                        </div>

                        <div id="image_csgo" >
                            <img src="{{url($abstract->image_url)}}" alt="{{$abstract->image_url}}" />
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="image_container">
                @foreach ($arts as $art)

                    <div class="image1" id="{{$art->id}}">
                        <div class = "image_title">
                            {{ $art->name}}
                        </div>

                        <div id="image_csgo" >
                            <img src="{{url($art->image_url)}}" alt="{{$art->image_url}}" />
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="image_container">
                @foreach ($animals as $animal)

                    <div class="image2" id="{{$animal->id}}">
                        <div class = "image_title">
                            {{ $animal->name}}
                        </div>

                        <div id="image_csgo" >
                            <img src="{{url($animal->image_url)}}" alt="{{$animal->image_url}}" />
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="image_container">
                @foreach ($natures as $nature)

                    <div class="image3" id="{{$nature->id}}">
                        <div class = "image_title">
                            {{ $nature->name}}
                        </div>

                        <div id="image_csgo" >
                            <img src="{{url($nature->image_url)}}" alt="{{$nature->image_url}}" />
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="image_container">
                @foreach ($technologys as $technology)

                    <div class="image4" id="{{$technology->id}}">
                        <div class = "image_title">
                        </div>

                        <div id="image_csgo" >
                            <img src="{{url($technology->image_url)}}" alt="{{$technology->image_url}}" />
                        </div>
                    </div>
                @endforeach
            </div>
                @endif

    </div>
</div>
@endsection
