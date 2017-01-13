@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Image</h1>
        <br>

        {!! Form::model(array('route' => 'images.edit', $test->id)) !!}

        <div class="form-group">
            {!! Form::label('Title') !!}
            {!! Form::text('title', $test->name, ['required', 'class'=>'form-control', 'placeholder'=>'Title']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Category') !!}
            {!! Form::select('category', array('Landscape' => 'Landscape', 'Sky' => 'Sky'), $test->category, array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Description') !!}
            {!! Form::textarea('description', $test->details,
                array('required',
                      'class'=>'form-control',
                      'placeholder'=>'Description')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Image url') !!}
            {!! Form::text('image_url', $test->image_url,
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
