@extends('layouts.app')

@section('content')

    <h1>Upload here your image</h1>
    <br>

    {!! Form::open(array('route' => 'images_store', 'class' => 'form')) !!}

    <div class="form-group">
        {!! Form::label('Name') !!}
        {!! Form::text('name', null,
            ['required',
                  'class'=>'form-control',
                  'placeholder'=>'Name']) !!}



    </div>

    <div class="form-group">
        {!! Form::label('Author') !!}
        {!! Form::text('author', null,
            array('required',
                  'class'=>'form-control',
                  'placeholder'=>'Your author')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Your Message') !!}
        {!! Form::text('message', null,
            array('required',
                  'class'=>'form-control',
                  'placeholder'=>'Your message')) !!}
    </div>
    <br>
    <div class="form-group">
        {!! Form::submit('Upload!',
          array('class'=>'btn btn-primary')) !!}
    </div>
    {!! Form::close() !!}
@endsection
