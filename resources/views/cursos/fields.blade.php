<!-- Cur Siglas Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cur_siglas', 'Siglas:') !!}
    {!! Form::text('cur_siglas', null, ['class' => 'form-control','maxlength' => 4]) !!}
</div>

<!-- Cur Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cur_descripcion', 'Descripcion:') !!}
    {!! Form::text('cur_descripcion', null, ['class' => 'form-control','maxlength' => 30]) !!}
</div>

<!-- Cur Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cur_numero', 'Numero:') !!}
    {!! Form::number('cur_numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cursos.index') }}" class="btn btn-danger float-right ">Cancelar</a>
</div>
