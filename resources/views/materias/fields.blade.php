<!-- Mat Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mat_descripcion', 'Descripcion:') !!}
    {!! Form::text('mat_descripcion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Mat Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mat_area', 'Area:') !!}
    {!! Form::select('mat_area',['CIENCIAS'=>'CIENCIAS','TECNICA'=>'TECNICA'],null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Mat Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mat_estado', 'Estado:') !!}
    {!! Form::select('mat_estado',['1'=>'ACTIVO','0'=>'INACTIVO'] ,null, ['class' => 'form-control']) !!}

</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('materias.index') }}" class="btn btn-danger float-right">Cancel</a>
</div>
