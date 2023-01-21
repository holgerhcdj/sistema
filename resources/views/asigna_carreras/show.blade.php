@extends('layouts.app')
@section('title')
    Asigna Carrera Details 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Asigna Carrera Details</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('asignaCarreras.index') }}"
                 class="btn btn-primary form-btn float-right">Back</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">
                    @include('asigna_carreras.show_fields')
            </div>
            </div>
    </div>
    </section>
@endsection
