@extends('layouts.app')

@section('content')
    <div class="container">

            <div class="imagePageTitle">All images</div>
            <div class="image_container">
                @foreach ($images as $image)
                    @if($image->active == 1)
                        <div class="image" id="{{$image->id}}">
                            <div class = "image_title">
                                {{ $image->name }}
                            </div>

                            <div id="image_csgo" >
                                <a href="{{URL::to('image/details/'.$image->id)}}"><img src="{{url($image->image_url)}}" alt="{{$image->image_url}}" /></a>
                            </div>

                            <div id="image_footer">
                                <div class="total">{{ $image->likes }}</div>
                                <img id="like" src="{{ Auth::user()->likes()->where('image_id', $image->id)->first() ? Auth::user()->likes()->where('image_id', $image->id)->first()->like == 'like' ? 'imagesButtons/upGreen.png' : 'imagesButtons/up.png' : 'imagesButtons/up.png'}}" alt="no image" onclick="isLiked('{{$image->id}}', 'like','{{$image->likes}}', this)"/>
                                <img id="dislike" src="{{ Auth::user()->likes()->where('image_id', $image->id)->first() ? Auth::user()->likes()->where('image_id', $image->id)->first()->like == 'dislike' ? 'imagesButtons/downRed.png' : 'imagesButtons/down.png' : 'imagesButtons/down.png'}}" alt="no image" onclick="isLiked('{{$image->id}}', 'dislike', '{{$image->likes}}', this)"/>
                            </div>


                        </div>
                    @endif

                @endforeach
            </div>
        </div>


    </div>
@endsection
