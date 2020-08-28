@extends('layouts.app')

@section('title', 'Retros')

@section('content')
    <h1>Edit '{{ $retro->title }}'</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {!! Form::model($retro, ['route' => ['retro.update', $retro->id], 'method' => 'put']) !!}

    @include('retro.form')

    <div class="form-group">
        {{ Form::submit('Update Retro', ['class' => 'btn btn-primary']) }}
    </div>

    {!! Form::close() !!}
@endsection