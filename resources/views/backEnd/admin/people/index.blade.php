@extends('backLayout.app') @section('title') Person @stop @section('content') @if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('message') }}
</div>
@endif
<h1>Personas <a href="{{ url('admin/people/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nueva Persona</a></h1>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table table-responsive">
      <table class="table table-bordered table-striped table-hover" id="people">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Correo electrónico</th>
            <th>Fecha de alta</th>
            <th>Detalles</th>
          </tr>
        </thead>
        <tbody>
          @foreach($people as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td><a href="{{ url('admin/people', $item->id) }}">{{ $item->name }}</a></td>
            <td>{{ $item->last_name }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ Date::parse($item->created_at)->format('l j F Y')}}</td>
            <td>
              <a href="{{ url('admin/people/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['admin/people', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar',
              ['class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("¿Estas seguro de eliminar este registro?")']) !!} {!! Form::close() !!}
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
    $('#people').DataTable({
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
