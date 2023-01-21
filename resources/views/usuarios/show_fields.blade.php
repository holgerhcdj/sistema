<!-- Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('password', 'Clave:') !!}
    <input type="password" class="form-control" id="password" name="password" required autocomplete="false">
</div>
<!-- Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('password_confirmation', 'Repita Clave:') !!}
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('usuarios.index') }}" class="btn btn-danger float-right">Cancelar</a>
</div>
