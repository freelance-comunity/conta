@extends('backLayout.app') @section('title') Calendar @stop @section('content') @if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('message') }}
</div>
@endif
{{-- <h1>Calendario <a href="{{ url('admin/calendar/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nuevo Calendario</a></h1> --}}
<h1>Calendario</h1>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table table-responsive">
      <table class="table table-bordered table-striped table-hover" id="calendar">
        <thead>
          <tr>
            <th>ID</th>
            <th>Link</th>
            <th>Detalles</th>
          </tr>
        </thead>
        <tbody>
          @foreach($calendar as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td><a href="{{ url('admin/calendar', $item->id) }}">{{ $item->body }}</a></td>
            <td>
              <a href="{{ url('admin/calendar/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a>
{{-- {!! Form::open([ 'method'=>'DELETE', 'url' => ['admin/calendar', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs']) !!} {!! Form::close() !!} --}}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
@endsection @section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#calendar').DataTable({
      "language": {
         "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
       },
      columnDefs: [{
        targets: [0],
        visible: false,
        searchable: false
      }, ],
      order: [
        [0, "asc"]
      ],
    });
  });
</script>
@endsection
