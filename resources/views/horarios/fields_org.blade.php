<!-- Asc Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('car_id', 'Asc Id:') !!}
    {!! Form::number('car_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cur Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cur_id', 'Cur Id:') !!}
    {!! Form::number('cur_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Mat Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mat_id', 'Mat Id:') !!}
    {!! Form::number('mat_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Usu Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usu_id', 'Usu Id:') !!}
    {!! Form::number('usu_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Hor Dia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hor_dia', 'Hor Dia:') !!}
    {!! Form::number('hor_dia', null, ['class' => 'form-control']) !!}
</div>

<!-- Hor Hora Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hor_hora', 'Hor Hora:') !!}
    {!! Form::number('hor_hora', null, ['class' => 'form-control']) !!}
</div>

<!-- Hor Paralelo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hor_paralelo', 'Hor Paralelo:') !!}
    {!! Form::number('hor_paralelo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('horarios.index') }}" class="btn btn-light">Cancel</a>
</div>
