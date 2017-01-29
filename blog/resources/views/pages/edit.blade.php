@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Image</h1>
        <br>

        {!! Form::model(array('route' => 'images.edit', $image->id)) !!}

        <div class="form-group">
            {!! Form::label('Title') !!}
            {!! Form::text('title', $image->name, ['required', 'class'=>'form-control', 'placeholder'=>'Title']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Category') !!}
            {!! Form::select('category', array('Abstract' => 'Abstract', 'Art' => 'Art', 'Animals' => 'Animals', 'Nature' => 'Nature', 'Technology' => 'Technology'), $image->category, array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Description') !!}
            {!! Form::textarea('description', $image->details,
                array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Description')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Image url') !!}
            {!! Form::text('image_url', $image->image_url,
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
