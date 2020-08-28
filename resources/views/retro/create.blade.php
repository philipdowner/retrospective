@extends('layouts.app')

@section('title', 'Retros')

@section('content')

    <h1>Create New Retrospective</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {!! Form::open(['url' => 'retro']) !!}

    @include('retro.form')

    <div class="form-group">
        {{ Form::submit('Create Retro', ['class' => 'btn btn-primary']) }}
    </div>

    {!! Form::close() !!}
@endsection