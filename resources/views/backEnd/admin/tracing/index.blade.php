@extends('backLayout.app')
@section('title')
Tracing
@stop

@section('content')

    <h1>Tracing <a href="{{ url('admin/tracing/create') }}" class="btn btn-primary pull-right btn-sm">Add New Tracing</a></h1>
    <div class="table table-responsive">
        <table class="table table-bordered table-striped table-hover" id="tbladmin/tracing">
            <thead>
                <tr>
                    <th>ID</th><th>Body</th><th>People</th><th>Type</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tracing as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('admin/tracing', $item->id) }}">{{ $item->body }}</a></td><td>{{ $item->people }}</td><td>{{ $item->type }}</td>
                    <td>
                        <a href="{{ url('admin/tracing/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">Update</a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/tracing', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tbladmin/tracing').DataTable({
            columnDefs: [{
                targets: [0],
                visible: false,
                searchable: false
                },
            ],
            order: [[0, "asc"]],
        });
    });
</script>
@endsection