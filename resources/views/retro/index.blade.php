@extends('layouts.app')

@section('title', 'Retros')

@section('content')

    <h1>Available Retrospectives</h1>

    @if ( session('success') )
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <p>
        <a href="{{ route('retro.create') }}" class="btn btn-primary">Add Retro</a>
    </p>
    <table class="itemIndex table table-striped" id="retrosIndex">
        <thead class="thead-dark">
            <tr>
                <th scope="col" class="id">ID</th>
                <th scope="col" class="title">Retro Name</th>
                <th scope="col" class="creator">Creator</th>
                <th scope="col" class="created_at">Created At</th>
                <th scope="col" class="status">Status</th>
                <th scope="col" class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($retros as $retro)
            <tr>
                <th scope="row" class="id">{{ $retro->id }}</td>
                <td class="title"><a href="{{ route('retro.show', $retro->id) }}">{{ $retro->title }}</a></td>
                <td class="creator"><a href="#" title="User {{ $user->id }}">{{ $user->name }}</a></td>
                <td class="created_at">{{ date('M/d/Y', strtotime($retro->created_at)) }}</td>
                <td class="status">{{ ucfirst($retro->status) }}</td>
                <td class="actions">
                    <form action="{{ route('retro.destroy', $retro->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('retro.edit', $retro->id) }}" class="btn btn-primary">Edit</a>
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection