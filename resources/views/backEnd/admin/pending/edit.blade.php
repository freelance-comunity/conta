@extends('backLayout.app')
@section('title')
Edit Pending
@stop

@section('content')

    <h1>Edit Pending</h1>
    <hr/>

    {!! Form::model($pending, [
        'method' => 'PATCH',
        'url' => ['admin/pending', $pending->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('owner') ? 'has-error' : ''}}">
                {!! Form::label('owner', 'Owner: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('owner', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('owner', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('affair') ? 'has-error' : ''}}">
                {!! Form::label('affair', 'Affair: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('affair', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('affair', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                {!! Form::label('status', 'Status: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection