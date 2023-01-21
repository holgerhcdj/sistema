@extends('layouts.app')
@section('title')
    Aula Virtual
@endsection
<?php 
    $day=date('D');
    function descripcion_horario($dia){

        $aux_l=explode('&',$dia);
        $hor_id=0;
        $desc='';
        if( isset($aux_l[1]) ){
            $hor_id=$aux_l[1];
            $desc="<small class='bg-info p-1 rounded text-white position-relative'>$aux_l[0]
                   </small>"; 
        }

        return[$desc,$hor_id];

    }
?>
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Aula Virtual {{ Auth::user()->name }}</h1>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                <h2 class="section-title">Cursos</h2>
                <p class="section-lead">Cursos de clase diario</p>
                        <ul class="list-unstyled list-unstyled-border" style="width:500px;">

                                @foreach($horarios as $h)
                                <?php

                                $lunes=descripcion_horario($h->lunes);
                                $martes=descripcion_horario($h->martes);
                                $miercoles=descripcion_horario($h->miercoles);
                                $jueves=descripcion_horario($h->jueves);
                                $viernes=descripcion_horario($h->viernes);

                                ?>
                                @if($day=='Mon')

                                  <li class="media">
                                    <a href="#">
                                      <img alt="image" class="mr-3 rounded" width="80" src="{{ asset('img/laptop.png') }}">
                                    </a>
                                    <div class="media-body">
                                      <div class="media-right">Hora: {{ $h->hora }}</div>
                                      <div class="media-title">{!! $lunes[0] !!}</div>
                                    </div>
                                  </li>


                              @endif

                                @if($day=='Tue')
                                  <li class="media">
                                    <a href="#">
                                      <img alt="image" class="mr-3 rounded" width="80" src="{{ asset('img/laptop.png') }}">
                                    </a>
                                    <div class="media-body">
                                      <div class="media-right">Hora: {{ $h->hora }}</div>
                                      <div class="media-title">{!! $martes[0] !!}</div>
                                    </div>
                                  </li>

                                  @endif

                                @if($day=='Wen')
                                  <li class="media">
                                    <a href="#">
                                      <img alt="image" class="mr-3 rounded" width="80" src="{{ asset('img/laptop.png') }}">
                                    </a>
                                    <div class="media-body">
                                      <div class="media-right">Hora: {{ $h->hora }}</div>
                                      <div class="media-title">{!! $miercoles[0] !!}</div>
                                    </div>
                                  </li>

                                  @endif

                                @if($day=='Thu')
                                  <li class="media">
                                    <a href="#">
                                      <img alt="image" class="mr-3 rounded" width="80" src="{{ asset('img/laptop.png') }}">
                                    </a>
                                    <div class="media-body">
                                      <div class="media-right">Hora: {{ $h->hora }}</div>
                                      <div class="media-title">{!! $jueves[0] !!}</div>
                                    </div>
                                  </li>

                                  @endif

                                @if($day=='Fri')
                                  <li class="media">
                                    <a href="#">
                                      <img alt="image" class="mr-3 rounded" width="80" src="{{ asset('img/laptop.png') }}">
                                    </a>
                                    <div class="media-body">
                                      <div class="media-right">Hora: {{ $h->hora }}</div>
                                      <div class="media-title">{!! $viernes[0] !!}</div>
                                    </div>
                                  </li>

                                  @endif

                                @endforeach

                            </ul>



            </div>
       </div>
   </div>
    
    </section>
@endsection

