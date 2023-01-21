@extends('layouts.app')
@section('title')
    Asignar Horarios 
@endsection
@section('content')
<style>
    .btn_delete{
        padding:2px 5px;
        cursor: pointer;
    }
    .btn_delete:hover{
        background:brown !important;
    }
    #tbl_horario td{
        padding: 5px 3px;
        border:solid 1px #ccc;
    }
</style>
@section('scripts')
<script>
    $(document).on("click",".btn_delete",function(){
        $("#hor_id").val($(this).attr('hor_id'));
        if(confirm("Desea Eliminar?")){
            $("#frm_delete").submit();
        }
    })
</script>
@endsection
<?php 
    $car_id=Session::get('car_id');
    function descripcion_horario($dia){

        $aux_l=explode('&',$dia);
        $hor_id=0;
        $desc='';
        if( isset($aux_l[1]) ){
            $hor_id=$aux_l[1];
            $desc="<small class='bg-info p-1 rounded text-white position-relative'>$aux_l[0]
                         <small class='bg-danger border border-light rounded  text-white btn_delete ' hor_id='$hor_id' >x</small>
                   </small>"; 
        }

        return[$desc,$hor_id];

    }
?>
    <section class="section">
            <div class="section-header">
                <h3 class="page__heading m-0">Asignar Horarios</h3>
                <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                    <a href="{{ route('horarios.index') }}"  class="btn btn-primary">Back</a>
                </div>
            </div>
  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body ">
                                    {!! Form::model($docente, ['route' => ['horarios.update', $docente->id], 'method' => 'patch']) !!}
                                        <div class="row">
                                            @include('horarios.fields')
                                        </div>
                                    {!! Form::close() !!}
                            </div>
                         </div>
                    </div>
                    <div class="col-lg-12">
                        <table class="border border-info " id="tbl_horario">
                            <tr>
                                <th colspan="6"><h3 class="text-center bg-info text-white">Horario del Docente</h3></th>
                            </tr>
                            <tr>
                                <th>Hora/Día</th>
                                <th>Lunes</th>
                                <th>Martes</th>
                                <th>Miercoles</th>
                                <th>Jueves</th>
                                <th>Viernes</th>
                            </tr>
                            <tbody>
                                @foreach($horarios as $h)
                                <?php

                                $lunes=descripcion_horario($h->lunes);
                                $martes=descripcion_horario($h->martes);
                                $miercoles=descripcion_horario($h->miercoles);
                                $jueves=descripcion_horario($h->jueves);
                                $viernes=descripcion_horario($h->viernes);

                                ?>
                                <tr>
                                <td>{{ $h->hora }}</td>
                                <td>{!! $lunes[0] !!}</td>
                                <td>{!! $martes[0] !!}</td>
                                <td>{!! $miercoles[0] !!}</td>
                                <td>{!! $jueves[0] !!}</td>
                                <td>{!! $viernes[0] !!}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                 </div>
              </div>
   </div>
  </section>
<form action="{{ route('horarios.destroy',0) }}" method="POST" id="frm_delete" >
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" id="hor_id" name="hor_id" value="0">
</form>
@endsection
