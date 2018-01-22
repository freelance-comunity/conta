@extends('backLayout.app') @section('title') Editar Seguimiento @stop @section('content')
<hr/>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Editar Seguimiento</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::model($tracing, [ 'method' => 'PATCH', 'url' => ['admin/tracing', $tracing->id], 'class' => 'form-horizontal' ]) !!}

    <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
      {!! Form::label('body', 'Anotación: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::textarea('body', null, ['class' => 'form-control', 'required' => 'required']) !!} {!! $errors->first('body', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('people') ? 'has-error' : ''}}">
      {!! Form::label('people', 'Quien observa: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::text('people', null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('people', '
        <p class="help-block">:message</p>') !!}
      </div>
    </div>
    <div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
      {!! Form::label('type', 'Type: ', ['class' => 'col-sm-3 control-label']) !!}
      <div class="col-sm-6">
        {!! Form::select('type',['ACUERDO' => 'ACUERDO', 'OBSERVACIÓN' => 'OBSERVACIÓN'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('type', '
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
@section('js')
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
<script>
  $('textarea').ckeditor();
  // $('.textarea').ckeditor(); // if class is prefered.
</script>
@endsection
