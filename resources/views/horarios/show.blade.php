@extends('layouts.app')
@section('title')
    Horarios Del docente
@endsection
<?php 
    $car_id=Session::get('car_id');
    function descripcion_horario($dia){

        $aux_l=explode('&',$dia);
        $hor_id=0;
        $desc='';
        if( isset($aux_l[1]) ){
            $hor_id=$aux_l[1];
            $desc="<small class='p-1 border border-bottom border-info rounded' style='font-weight:bolder'>$aux_l[0]</small>"; 
        }

        return[$desc,$hor_id];

    }
?>
<style>
    #tbl_horario td{
        padding: 5px 3px;
        border:solid 1px #ccc;
        font-size: 12px ;
    }
@media print {
    #btn_imprimir,#btn_back{
        display:none;
    }
}    
</style>
@section('scripts')

<script>
function imprimir(){
    window.print();    
}

</script>
@endsection
@section('content')

    <section class="section">
        <div class="section-header">
        <h1>{{ $docente->name }}</h1>
        <div class="section-header-breadcrumb">
        <span class="btn btn-light form-btn float-left " id="btn_imprimir" onclick="imprimir()" >Imprimir</span>
            <a href="{{ route('horarios.index') }}" id="btn_back" class="btn btn-primary form-btn float-right">Atras</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('horarios.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
