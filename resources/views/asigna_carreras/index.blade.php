@extends('layouts.app')
@section('title')
    Asignar Carreras
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Asignar Administradores de Carrera </h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('asignaCarreras.create')}}" class="btn btn-primary form-btn">Asigna Carrera <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('asigna_carreras.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

