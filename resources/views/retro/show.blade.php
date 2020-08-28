@php
use App\Http\Controllers\RetroController
@endphp

@extends('layouts.app')

@section('title', 'Retros')

@section('content')
    <h1>{{ $retro->title }}</h1>
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item align-items-center">Status: <span class="badge badge-pill badge-primary">{{ RetroController::getStatusDisplayText($retro) }}</span></li>
        <li class="list-group-item align-items-center">Owner: <a href="#">{{ $user->name }}</a></li>
        <li class="list-group-item align-items-center">Created: {{ $retro->created_at }}</li>
        <li class="list-group-item align-items-center">Last Updated: {{ $retro->updated_at}}</li>
        <li class="list-group-item align-items-center"><a href="{{ route('retro.edit', $retro) }}" class="btn btn-primary">Edit</a></li>
    </ul>
@endsection