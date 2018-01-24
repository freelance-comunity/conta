@extends('adminlte::page') @section('title', 'Inicio') @section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$users->count()}}</h3>
        <p>Usuarios registrados</p>
      </div>
      <div class="icon">
        <i class="fa fa-user-plus"></i>
      </div>
      <a href="{{url('admin/users')}}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{$pendings->count()}}</h3>
        <p>Casos en proceso</p>
      </div>
      <div class="icon">
        <i class="fa fa-hourglass-end"></i>
      </div>
      <a href="{{url('admin/process')}}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{$terminates->count()}}</h3>
        <p>Casos finalizados</p>
      </div>
      <div class="icon">
        <i class="fa fa-archive"></i>
      </div>
      <a href="{{url('admin/terminate')}}" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
<!-- /.row -->
<div class="row">
  <div class="col-md-6">
    <!-- USERS LIST -->
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Usuarios en Linea</h3>
        <div class="box-tools pull-right">
          <span class="label label-success">{{ $activities->count() }} en linea</span>
          <button type="button" class="btn btn-box-tool" data-widget="collapse">
  						<i class="fa fa-minus"></i>
  					</button>
          <button type="button" class="btn btn-box-tool" data-widget="remove">
  						<i class="fa fa-times"></i>
  					</button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <ul class="users-list clearfix">
          @foreach ($activities as $activity) @if ($activity->user->id > 2)
          <li>
            <img src="{{ Gravatar::get($activity->user->email)}}" style="width:128px; height:128px;" class="online" alt="User Image">
            <a class="users-list-name" href="#">{{ $activity->user->name }}</a>
          </li>
          @endif @endforeach
        </ul>
        <!-- /.users-list -->
      </div>
    </div>
    <!--/.box -->
  </div>
  <!-- /.col -->
  @if ($lasts->isEmpty())
  <div class="well text-center">No hay casos registrados.</div>
  @else
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Ultimo caso agregado</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <ul class="products-list product-list-in-box">
          <li class="item">
            <div class="product-img">
              <a class="btn btn-primary" href="{{ url('admin/pending', $lasts->id) }}" aria-label="Ver">
                <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
              </a>
            </div>
            <div class="product-info">
              <a href="{{ url('admin/pending', $lasts->id) }}" class="product-title">{{$lasts->owner}}
                <span class="label label-success pull-right">{{ Date::parse($lasts->created_at)->format('l j F Y')}}</span></a>
              </a>
              <span class="product-description">
                    {{$lasts->affair}}
                  </span>
            </div>
          </li>
          <!-- /.item -->
        </ul>
      </div>
      <!-- /.box-body -->
      <div class="box-footer text-center">
        <a href="{{url('admin/pending')}}" class="uppercase">Ver todos</a>
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /.box -->
  </div>
  @endif
</div>
@stop
