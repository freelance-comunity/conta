@extends('backLayout.app') @section('title') {{$pending->affair}} @stop @section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Caso</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table table-responsive">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>ID.</th>
              <th>Caso de</th>
              <th>Asunto</th>
              <th>Estatus</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $pending->id }}</td>
              <td> {{ $pending->owner }} </td>
              <td> {{ $pending->affair }} </td>
              <td> {{ $pending->status }} </td>
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
      <h1>Historial <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
        Agregar Seguimiento
      </button></h1> @include('backEnd.admin.pending.tracing') @if ($tracings->isEmpty())
      <div class="well text-center">Ho hay seguimiento a este caso.</div> @else @foreach ($tracings as $element)
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

            <h3 class="timeline-header"><a href="#">{{$element->people}}</a></h3>

            <div class="timeline-body">
              {!! $element->body !!}
            </div>

            <div class="timeline-footer">
              <a class="btn bg-purple btn-xs">{{$element->type}}</a>
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
