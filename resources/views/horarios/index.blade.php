@extends('layouts.app')
@section('title')
    Horarios
@endsection
@section('content')
    <section class="section">

    <div class="section-header">
        @if(Auth::user()->perfil==0)
            <h1>Horarios/Docentes </h1>
        @else
            <h1>Horarios/Docentes para la Carrera de {{ $asignacion->car_nombre }}</h1>
        @endif
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('horarios.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

