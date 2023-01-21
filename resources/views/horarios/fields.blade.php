  <div class="input-group ">
    {!! Form::hidden('usu_id',$docente->id,['class' => 'form-control']) !!}
    {!! Form::hidden('car_id',$car_id,['class' => 'form-control']) !!}

    <div class="input-group-prepend">
      <span class="input-group-text font-weight-bold">Materia</span>
    </div>
    {!! Form::select('mat_id',$materias,null, ['class' => 'form-control']) !!}

    <div class="input-group-prepend">
      <span class="input-group-text font-weight-bold">Curso</span>
    </div>
    {!! Form::select('cur_id',$cursos,null, ['class' => 'form-control']) !!}

    <div class="input-group-prepend">
      <span class="input-group-text font-weight-bold">Paralelo</span>
    </div>
    {!! Form::select('hor_paralelo',$paralelos,null, ['class' => 'form-control']) !!}

    <div class="input-group-prepend">
      <span class="input-group-text font-weight-bold">Dia</span>
    </div>
    {!! Form::select('hor_dia',$dias,null, ['class' => 'form-control']) !!}

    <div class="input-group-prepend">
      <span class="input-group-text font-weight-bold">Hora</span>
    </div>
    {!! Form::select('hor_hora',$horas,null, ['class' => 'form-control']) !!}

    <div class="input-group-append">
      <button class="btn btn-success"> <i class="fa fa-plus" ></i> </button>
    </div>
  </div>


