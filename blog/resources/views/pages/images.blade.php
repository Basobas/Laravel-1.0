<link href="{{ URL::asset('css/images.css') }}" rel="stylesheet">

@extends('layouts.app')

@section('content')

    <div class="imagePage_container">
        {!! Form::open(array('route' => 'images.search', 'method'=> 'GET', 'class'=>'form navbar-form searchform', 'role' => 'search')) !!}
        {!! Form::select('category', array('' => '','Abstract' => 'Abstract', 'Art' => 'Art', 'Animals' => 'Animals', 'Nature' => 'Nature', 'Technology' => 'Technology'), '', array('class'=>'form-control')) !!}
        {!! Form::text('search', '', array('class'=>'form-control', 'placeholder'=>'Search...')) !!}
        {!! Form::submit('Search', array('class'=>'btn btn-default')) !!}
        {!! Form::close() !!}


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
                    @if($amountimages >= 3)
                    <div class="total">{{ $image->likes }}</div>
                    <img id="like" src="{{ Auth::user()->likes()->where('image_id', $image->id)->first() ? Auth::user()->likes()->where('image_id', $image->id)->first()->like == 'like' ? 'imagesButtons/upGreen.png' : 'imagesButtons/up.png' : 'imagesButtons/up.png'}}" alt="no image" onclick="isLiked('{{$image->id}}', 'like','{{$image->likes}}', this)"/>
                    <img id="dislike" src="{{ Auth::user()->likes()->where('image_id', $image->id)->first() ? Auth::user()->likes()->where('image_id', $image->id)->first()->like == 'dislike' ? 'imagesButtons/downRed.png' : 'imagesButtons/down.png' : 'imagesButtons/down.png'}}" alt="no image" onclick="isLiked('{{$image->id}}', 'dislike', '{{$image->likes}}', this)"/>
                    @else
                    @endif
                </div>
            </div>
                @endif

        @endforeach
        </div>
    </div>

@endsection
