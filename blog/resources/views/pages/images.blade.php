
@extends('layouts.app')

@section('content')
    <h1>All images</h1>
    @foreach ($images as $image)

        <div class="panel-body">
            {{ $image->name }}
        </div>
    @endforeach



@endsection
