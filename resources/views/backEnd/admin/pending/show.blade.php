@extends('backLayout.app') @section('title') {{$pending->affair}} @stop @section('content') @if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('message') }}
</div>
@endif
<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table table-responsive">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
          <thead class="bg-blue">
            <tr>
              <th>ID.</th>
              <th>Caso de</th>
              <th>Asunto</th>
              <th>Estatus</th>
              <th>Detalles</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $pending->id }}</td>
              <td> {{ $pending->owner }} </td>
              <td> <strong>{{ $pending->affair }}</strong> </td>
              <td> {{ $pending->status }}</td>
              <td>
                @if ($pending->status === 'TERMINADO')
                @else
                <a href="{{url('terminatePending')}}/{{$pending->id}}" class="btn btn-danger">Terminar caso</a> @endif
                <a href="{{url('pdf')}}/{{$pending->id}}" class="btn btn-success"><i class="fa fa-file-pdf-o"></i> Descargar</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
      <h1>Historial
      @if ($pending->status === 'TERMINADO')

      @else
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
        Agregar Seguimiento
      </button>
      @endif</h1> @include('backEnd.admin.pending.tracing') @if ($tracings->isEmpty())
      <div class="well text-center">No hay seguimiento a este caso.</div> @else @foreach ($tracings as $element)
      <ul class="timeline">

        <!-- timeline time label -->
        <li class="time-label">
          <span class="bg-yellow">
              {{ Date::parse($element->created_at)->format('l j F Y')}}
          </span>
        </li>
        <!-- /.timeline-label -->

        <!-- timeline item -->
        <li>
          <!-- timeline icon -->
          <i class="fa fa-comments-o bg-green"></i>
          <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> {{ Date::parse($element->created_at)->format('H:i:s')}}</span>

            <h3 class="timeline-header"><a href="#">{{$element->people}} ({{$element->type}})</a> <b>Terminado: {{$element->fulfilled}}</b></h3>

            <div class="timeline-body">
              {!! $element->body !!}
            </div>

            <div class="timeline-footer">
              <a href="{{ url('admin/tracing/' . $element->id . '/edit') }}" class="btn btn-primary btn-xs">Editar</a>
              {!! Form::open([ 'method'=>'DELETE', 'url' => ['admin/tracing', $element->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("¿Estas seguro de eliminar este registro?")'])
              !!} {!! Form::close() !!}
              @if ($element->fulfilled === 'SI')
              @else
              <a href="{{url('terminate')}}/{{$element->id}}" class="btn btn-warning btn-xs" onclick="return confirm('¿Estas seguro de terminar esta actividad?')">Terminar</a> @endif
              @if ($element->fulfilled === 'NO')
              <button class="btn btn-success btn-xs" type="button" name="button">Tiempo transcurrido: {{ Date::parse($element->created_at)->ago()}}</button>
              @endif
            </div>
          </div>
        </li>
        <!-- END timeline item -->
      </ul>
      @endforeach @endif
    </div>
  </div>
  @if ($errors->any())
  <ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
  @endif @endsection @section('js')
  <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
  <script src="{{asset('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>
  <script>
    $('textarea').ckeditor();
    // $('.textarea').ckeditor(); // if class is prefered.
  </script>
  @endsection
