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
            <th>Caso de</th>
            <th>Asunto</th>
            <th>Estatus</th>
            <th>Duración</th>
            <th>Detalles</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pending as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td><b>{{ $item->owner }}</b></td>
            <td>{{ $item->affair }}</td>
            <td>{{ $item->status }}</td>
            @if ($item->status === 'TERMINADO') @php $to = Carbon\Carbon::parse($item->created_at); $from = Carbon\Carbon::parse($item->end_date); $diff_in_days = $to->diffInDays($from); @endphp
            <td>{{ $diff_in_days}} días</td>
            @else
            <td>El caso aún no termina</td>
            @endif
            <td>
              @can ('editar_casos')
              <a href="{{ url('admin/pending/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Actualizar</a> @endcan @can ('eliminar_casos') {!! Form::open([ 'method'=>'DELETE', 'url' => ['admin/pending', $item->id], 'style' => 'display:inline'
              ]) !!} {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-xs', 'onclick'=>'return confirm("¿Estas seguro de eliminar este registro?")']) !!} {!! Form::close() !!} @endcan
              <a href="{{ url('admin/pending', $item->id) }}" class="btn btn-success btn-xs">Ver</a>
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
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js" charset="utf-8"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#pending').DataTable({
      dom: 'Bfrtip',
      buttons: [{
          extend: 'copyHtml5',
          exportOptions: {
            columns: [0, ':visible']
          }
        },
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'pdfHtml5',
          exportOptions: {
            columns: ':visible'
          }
        },
        'colvis'
      ],
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
