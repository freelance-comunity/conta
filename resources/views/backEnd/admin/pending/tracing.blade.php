<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Agregar Seguimiento</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => 'admin/tracing', 'class' => 'form-horizontal']) !!}
        <div class="form-group col-sm-6 col-lg-12">
          {!! Form::label('annotation', 'Anotación: ') !!} {!! Form::textarea('body',null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('body', '
          <p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group col-sm-6 col-lg-12 {{ $errors->has('affair') ? 'has-error' : ''}}">
          {!! Form::label('affair', 'Quien observa: ') !!} {!! Form::text('people',null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('people', '
          <p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group col-sm-6 col-lg-12 {{ $errors->has('affair') ? 'has-error' : ''}}">
          {!! Form::label('affair', 'Tipo de nota: ') !!} {!! Form::select('type',['ACUERDO' => 'ACUERDO', 'OBSERVACIÓN' => 'OBSERVACIÓN'], null, ['class' => 'form-control input-lg', 'required' => 'required']) !!} {!! $errors->first('type', '
          <p class="help-block">:message</p>') !!}
        </div>
        <input type="hidden" name="pending_id" value="{{$pending->id}}">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button> {{-- <button type="button" class="btn btn-primary">Guardar</button> --}} {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!} {!! Form::close()
        !!}
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
