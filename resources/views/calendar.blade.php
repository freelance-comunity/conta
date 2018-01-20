@extends('backLayout.app') @section('title') Calendario @stop @section('content')
<hr/>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Calendario</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    @foreach ($calendars as $calendar)
        {!! $calendar->body !!}
    @endforeach
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
