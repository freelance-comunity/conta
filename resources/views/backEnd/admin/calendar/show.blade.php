@extends('backLayout.app')
@section('title')
Calendar
@stop

@section('content')

    <h1>Calendar</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Body</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $calendar->id }}</td> <td> {{ $calendar->body }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection