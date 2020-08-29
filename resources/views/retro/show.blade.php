@php
use App\Http\Controllers\RetroController
@endphp

@extends('layouts.app')

@section('title', 'Retros')

@section('content')
    <h1>{{ $retro->title }}</h1>
    <p><strong>Description:</strong> {{ nl2br($retro->description) }}</p>
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item align-items-center">Status: <span class="badge badge-pill badge-primary">{{ RetroController::getStatusDisplayText($retro) }}</span></li>
        <li class="list-group-item align-items-center">Owner: <a href="#">{{ $user->name }}</a></li>
        <li class="list-group-item align-items-center">Created: {{ $retro->created_at }}</li>
        <li class="list-group-item align-items-center">Last Updated: {{ $retro->updated_at}}</li>
        <li class="list-group-item align-items-center"><a href="{{ route('retro.edit', $retro) }}" class="btn btn-primary">Edit</a></li>
    </ul>

    <h2>There are {{ count($issues) }} Issues</h2>
    
    <p><a href="{{ route('createissue', ['id' => $retro->id]) }}" class="btn btn-primary">Add Issue</a></p>

    <ol class="list-group-flush">
    @foreach ($issues as $issue)
        <li class="list-group-item">
        <p>{{ $issue->description }} <span class="badge badge-pill badge-primary category-{{ strtolower($issue->category) }}">{{ $issue->category }}</span></p>
        <p><cite>{{ $issue->user->name }}</cite></p>
        </li>
    @endforeach
    </ol>
@endsection