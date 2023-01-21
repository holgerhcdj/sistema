<!-- Usu Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usu_id', 'Administrador:') !!}
    {!! Form::select('usu_id',$admins,null, ['class' => 'form-control']) !!}
</div>

<!-- Car Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('car_id', 'Carrera:') !!}
    {!! Form::select('car_id',$carreras,null, ['class' => 'form-control']) !!}
</div>


<!-- Asc Observaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asc_observaciones', 'Observaciones:') !!}
    {!! Form::text('asc_observaciones', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('asignaCarreras.index') }}" class="btn btn-danger float-right">Cancelar</a>
</div>
