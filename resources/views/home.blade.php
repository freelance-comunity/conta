@extends('adminlte::page') @section('title', 'AdminLTE') @section('content_header')
<h1>Inicio</h1> @stop @section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>150</h3>

        <p>Usuarios registrados</p>
      </div>
      <div class="icon">
        <i class="fa fa-user-plus"></i>
      </div>
      <a href="#" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>53</h3>

        <p>Casos en proceso</p>
      </div>
      <div class="icon">
        <i class="fa fa-hourglass-end"></i>
      </div>
      <a href="#" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>44</h3>

        <p>Casos finalizados</p>
      </div>
      <div class="icon">
        <i class="fa fa-archive"></i>
      </div>
      <a href="#" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>65</h3>

        <p>Mensajes</p>
      </div>
      <div class="icon">
        <i class="fa fa-commenting-o"></i>
      </div>
      <a href="#" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
<div class="row">
  <div class="col-md-6">
    <!-- USERS LIST -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Usuarios en linea</h3>

        <div class="box-tools pull-right">
          <span class="label label-success">{{$users->count()}} en linea</span>
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
          </button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <ul class="users-list clearfix">
          <li>
            @foreach ($users as $user)
            <img src="{{ Gravatar::get($user->email)}}" style="width:128px; height:128px;" class="online" alt="User Image">
            <a class="users-list-name" href="#">{{$user->name}}</a> @endforeach
          </li>
        </ul>
        <!-- /.users-list -->
      </div>
      <!-- /.box-body -->
      {{--
      <div class="box-footer text-center">
        <a href="javascript:void(0)" class="uppercase">View All Users</a>
      </div>
      <!-- /.box-footer -->--}}
    </div>
    <!--/.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-6">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Casos agregados recientemente</h3>

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
              <a class="btn btn-info" href="#" aria-label="Ver">
                <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
              </a>
            </div>
            <div class="product-info">
              <a href="javascript:void(0)" class="product-title">Seguimiento caso número 1
                <span class="label label-warning pull-right">2018-01-16</span></a>
              </a>
              <span class="product-description">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </span>
            </div>
          </li>
          <!-- /.item -->
        </ul>
      </div>
      <!-- /.box-body -->
      <div class="box-footer text-center">
        <a href="javascript:void(0)" class="uppercase">Ver todos</a>
      </div>
      <!-- /.box-footer -->
    </div>
    <!-- /.box -->
  </div>
</div>
@stop
