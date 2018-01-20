@extends('backLayout.app') @section('title') Editar Calendario @stop @section('content')
<hr/>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Editar Calendario</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::model($calendar, [ 'method' => 'PATCH', 'url' => ['admin/calendar', $calendar->id], 'class' => 'form-horizontal' ]) !!}

    <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
      {!! Form::label('body', 'Link: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::textarea('body', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('body', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>

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
