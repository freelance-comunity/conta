@extends('backLayout.app') @section('title') Editar Usuario @stop @section('content')
<hr/>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Editar Usuario</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::model($user, [ 'method' => 'PATCH', 'url' => ['admin/users', $user->id], 'class' => 'form-horizontal' ]) !!}

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
      {!! Form::label('name', 'Nombre completo: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('name', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('name', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
      {!! Form::label('email', 'Correo Electrónico: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::email('email', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('email', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
      {!! Form::label('password', 'Contraseña: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::password('password', ['class' => 'form-control input-lg']) !!} {!! $errors->first('password', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group @if ($errors->has('roles')) has-error @endif">
      {!! Form::label('roles[]', 'Roles:', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
      {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null, ['class' => 'form-control', 'multiple']) !!} @if ($errors->has('roles'))
      <p class="help-block">{{ $errors->first('roles') }}</p> @endif
      </div>
    </div>
    <!-- Permissions -->
    @if(isset($user))
        @include('shared._permissions', ['closed' => 'true', 'model' => $user ])
    @endif

    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-3">
        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary form-control']) !!}
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
