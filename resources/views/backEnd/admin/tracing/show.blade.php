@extends('backLayout.app')
@section('title')
Tracing
@stop

@section('content')

    <h1>Tracing</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Body</th><th>People</th><th>Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tracing->id }}</td> <td> {{ $tracing->body }} </td><td> {{ $tracing->people }} </td><td> {{ $tracing->type }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection