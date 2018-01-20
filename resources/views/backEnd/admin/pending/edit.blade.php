@extends('backLayout.app')
@section('title')
Editar Caso
@stop

@section('content')
    <hr/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Editar Caso</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
    {!! Form::model($pending, [
        'method' => 'PATCH',
        'url' => ['admin/pending', $pending->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('owner') ? 'has-error' : ''}}">
                {!! Form::label('owner', 'Caso de: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('owner', null, ['class' => 'form-control', 'required' => 'required', 'readonly']) !!}
                    {!! $errors->first('owner', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('affair') ? 'has-error' : ''}}">
                {!! Form::label('affair', 'Asunto: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('affair', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('affair', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                {!! Form::label('status', 'Estatus: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('status',['EN PROCESO' => 'EN PROCESO', 'TERMINADO' => 'TERMINADO'], null,['class' => 'form-control']) !!}
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary form-control']) !!}
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
  </div>
  <!-- /.box-body -->
  </div>
  <!-- /.box -->
@endsection
