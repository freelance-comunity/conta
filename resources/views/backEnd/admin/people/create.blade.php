@extends('backLayout.app') @section('title') Create new Person @stop @section('content')
<hr/>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Crear Nueva Persona</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url' => 'admin/people', 'class' => 'form-horizontal']) !!}

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
      {!! Form::label('name', 'Nombre: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('name', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
      {!! Form::label('last_name', 'Apellidos: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('last_name', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('last_name', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
      {!! Form::label('phone', 'Teléfono: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('phone', null, ['class' => 'form-control input-lg']) !!} {!! $errors->first('phone', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
      {!! Form::label('email', 'Correo electrónico: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::email('email', null, ['class' => 'form-control input-lg']) !!} {!! $errors->first('email', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>


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
