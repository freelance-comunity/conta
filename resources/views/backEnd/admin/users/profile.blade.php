@extends('backLayout.app') @section('title') Perfil @stop @section('content')
<hr/>
@if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('message') }}
</div>
@endif
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Perfil</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url' => 'admin/settings', 'class' => 'form-horizontal']) !!}

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
      {!! Form::label('name', 'Nombre completo: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('name', $user->name, ['class' => 'form-control input-lg', 'required' => 'required', 'readonly']) !!} {!! $errors->first('name', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
      {!! Form::label('email', 'Correo Electrónico: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::email('email',$user->email, ['class' => 'form-control input-lg', 'required' => 'required', 'readonly']) !!} {!! $errors->first('email', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
      {!! Form::label('password', 'Contraseña: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::password('password', ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('password', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
      {!! Form::label('password_confirmation', 'Confirmar contraseña: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::password('password_confirmation', ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('password_confirmation', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit('Actualizar perfil', ['class' => 'btn btn-primary form-control']) !!}
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
