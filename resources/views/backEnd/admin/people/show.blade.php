@extends('backLayout.app')
@section('title')
Person
@stop

@section('content')

    <h1>Person</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th><th>Last Name</th><th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $person->id }}</td> <td> {{ $person->name }} </td><td> {{ $person->last_name }} </td><td> {{ $person->phone }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection