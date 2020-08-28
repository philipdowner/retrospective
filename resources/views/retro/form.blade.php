@section('retroform')

<div class="form-group">
    {{ Form::label('name', 'Retro Title') }}
    {{ Form::text('title', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
    {{ Form::label('status', 'Status') }}
    {{ Form::select('status', ['draft' => 'Draft', 'publish' => 'Publish', 'archive' => 'Archive'], 'publish', ['class' => 'form-control']) }}
</div>
@show