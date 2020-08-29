@extends('layouts.app')

@section('title', 'Retros')

@section('content')
    <h1>Add Issue</h1>

    {!! Form::open(['route' => ['createissue', $request->route('id')]]) !!}

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('category', 'Category') }}
        {{ Form::select('category', ['Liked', 'Learned', 'Lacked', 'Longed For'], null, ['placeholder' => 'Choose a category...', 'class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::submit('Add Issue', ['class' => 'btn btn-primary']) }}
    </div>

    {!! Form::close() !!}
@endsection