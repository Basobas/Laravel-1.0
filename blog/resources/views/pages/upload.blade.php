@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Upload here your image</h1>
    <br>

    {!! Form::open(array('route' => 'images.store', 'class' => 'form',)) !!}

    <div class="form-group">
        {!! Form::label('Title') !!}
        {!! Form::text('title', null,['required', 'class'=>'form-control', 'placeholder'=>'Title']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Category') !!}
        {!! Form::select('category', array('Abstract' => 'Abstract', 'Art' => 'Art', 'Animals' => 'Animals', 'Nature' => 'Nature', 'Technology' => 'Technology'), 'Abstract', array('class'=>'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Description') !!}
        {!! Form::textarea('description', null,
            array('required',
                  'class'=>'form-control',
                  'placeholder'=>'Description')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Image url') !!}
        {!! Form::text('image_url', null,
            array('required',
                  'class'=>'form-control',
                  'placeholder'=>'Put in your image url')) !!}
    </div>
    <br>
    <div class = "test">
    <div class="form-group">
        {!! Form::submit('Upload!',
          array('class'=>'btn btn-primary')) !!}
    </div>
    </div>
    {!! Form::close() !!}
</div>

@endsection
