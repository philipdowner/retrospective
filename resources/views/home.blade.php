@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>
                    {{ __('Welcome back. You are logged in, ' . Auth::user()->name) }}
                    </p>

                    <ul>
                        <li><a href="{{ route('retro.index') }}">List my Retros</a></li>
                        <li><a href="#">Create a new Retro</a></li>
                        <li><a href="#">Edit my profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
