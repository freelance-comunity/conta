@extends('backLayout.app') @section('title') Crear nuevo Caso @stop @section('content')

<hr/>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Crear Nuevo Caso</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url' => 'admin/pending', 'class' => 'form-horizontal']) !!}

    <div class="form-group {{ $errors->has('owner') ? 'has-error' : ''}}">
      {!! Form::label('owner', 'Caso de: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::select('owner', $peoples,null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('owner', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('affair') ? 'has-error' : ''}}">
      {!! Form::label('affair', 'Asunto: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('affair', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('affair', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    {{-- <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
      {!! Form::label('status', 'Status: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('status', null, ['class' => 'form-control input-lg']) !!} {!! $errors->first('status', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div> --}}


    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit('Crear', ['class' => 'btn btn-primary form-control']) !!}
      </div>
    </div>
    {!! Form::close() !!} @if ($errors->any())
    <ul class="alert alert-danger">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
    @endif
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
