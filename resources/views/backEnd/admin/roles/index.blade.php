@extends('backLayout.app') @section('title') Roles @stop @section('content') @if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('message') }}
</div>
@endif
<!-- Modal -->
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
  <div class="modal-dialog" role="document">
    {!! Form::open(['method' => 'post']) !!}

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="roleModalLabel">Rol</h4>
      </div>
      <div class="modal-body">
        <!-- name Form Input -->
        <div class="form-group @if ($errors->has('name')) has-error @endif">
          {!! Form::label('name', 'Nombre') !!} {!! Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'Nombre del rol']) !!} @if ($errors->has('name'))
          <p class="help-block">{{ $errors->first('name') }}</p> @endif
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        <!-- Submit Form Button -->
        {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
<h1>Roles <a href="#" class="btn btn-primary pull-right btn-sm" data-toggle="modal" data-target="#roleModal"> <i class="glyphicon glyphicon-plus"></i> Agregar Nuevo Rol</a></h1>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {{-- <div class="table table-responsive">
      <table class="table table-bordered table-striped table-hover" id="roles">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Detalles</th>
          </tr>
        </thead>
        <tbody>
          @foreach($roles as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td><a href="{{ url('admin/roles', $item->id) }}">{{ $item->name }}</a></td>
            <td>
              <a href="{{ url('admin/roles/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a> {!! Form::open([ 'method'=>'DELETE', 'url' => ['admin/roles', $item->id], 'style' => 'display:inline' ]) !!} {!! Form::submit('Eliminar',
              ['class' => 'btn btn-danger btn-xs']) !!} {!! Form::close() !!}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div> --}}
    @forelse ($roles as $role)
        {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update',  $role->id ], 'class' => 'm-b']) !!}

        @if($role->name === 'Admin')
            @include('shared._permissions', [
                          'title' => $role->name .' Permisos',
                          'options' => ['disabled'] ])
        @else
            @include('shared._permissions', [
                          'title' => $role->name .' Permisos',
                          'model' => $role ])
            @can('editar_roles')
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            @endcan
        @endif

        {!! Form::close() !!}

    @empty
        <p>No Roles defined, please run <code>php artisan db:seed</code> to seed some dummy data.</p>
    @endforelse
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>

@endsection @section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#roles').DataTable({
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
