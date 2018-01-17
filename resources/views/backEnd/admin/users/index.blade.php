@extends('backLayout.app') @section('title') Usuarios @stop @section('content')
  @if(session()->has('message'))
  <div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('message') }}
  </div>
  @endif
<h1>Usuarios <a href="{{ url('admin/users/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nuevo Usuario</a></h1>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table table-responsive">
      <table class="table table-bordered table-striped table-hover" id="users">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Fecha de alta</th>
            <th>Detalles</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td><a href="{{ url('admin/users', $item->id) }}">{{ $item->name }}</a></td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->roles->implode('name', ', ') }}</td>
            <td>{{ $item->created_at->toFormattedDateString() }}</td>
            <td>
              @can('editar_usuarios')
              <a href="{{ url('admin/users/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a>
              @endcan
              @can('eliminar_usuarios')
              {!! Form::open([ 'method'=>'DELETE', 'url' => ['admin/users', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar', ['class'
              => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("¿Estas seguro de eliminar este usuario?")']) !!} {!! Form::close() !!}
              @endcan
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
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Roles y permisos de usuario</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection @section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#users').DataTable({
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
