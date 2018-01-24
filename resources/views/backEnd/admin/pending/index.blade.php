@extends('backLayout.app') @section('title') Casos @stop @section('content') @if(session()->has('message'))
<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session()->get('message') }}
</div>
@endif
<h1>Casos @can('agregar_casos')<a href="{{ url('admin/pending/create') }}" class="btn btn-primary pull-right btn-sm">Agregar Nuevo Caso</a>@endcan</h1>
<div class="box">
  <div class="box-header">
    <h3 class="box-title"></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="table table-responsive">
      <table class="table table-bordered table-striped table-hover" id="pending">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre(s)</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Casos</th>
          </tr>
        </thead>
        <tbody>
          @foreach($persons as $item)
          @php
            $pendings = $item->pendings;
          @endphp
          <tr>
            <td>{{ $item->id }}</td>
            <td><a href="{{ url('admin/single', $item->id) }}">{{ $item->name }}</a></td>
            <td>{{ $item->last_name }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{$pendings->count()}}</td>
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
    $('#pending').DataTable({
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
