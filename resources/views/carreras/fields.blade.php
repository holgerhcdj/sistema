<!-- Car Siglas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('car_siglas', 'Siglas:') !!}
    {!! Form::text('car_siglas', null, ['class' => 'form-control','maxlength' => 3]) !!}
</div>

<!-- Car Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('car_nombre', 'Nombre:') !!}
    {!! Form::text('car_nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Car Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('car_estado', 'Estado:') !!}
    {!! Form::select('car_estado', ['1'=>'ACTIVO','0'=>'INACTIVO'],null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('carreras.index') }}" class="btn btn-danger float-right">Cancel</a>
</div>
