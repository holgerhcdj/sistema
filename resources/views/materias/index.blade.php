@extends('layouts.app')
@section('title')
    Materias 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Materias</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('materias.create')}}" class="btn btn-primary form-btn">Materias <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <form action="{{ route('materias.index') }}" method="POST">
                    @csrf
                    <div class="input-group ">
                        <div class="input-group-prepend">
                          <span class="input-group-text font-weight-bold">Materia</span>
                      </div>
                      {!! Form::text('materia',null, ['class' => 'form-control','placeholder'=>'Nombre de la Materia']) !!}

                      <div class="input-group-prepend">
                          <span class="input-group-text font-weight-bold">Area</span>
                      </div>

                      {!! Form::select('area',['0'=>'--Todos--','TECNICA'=>'TECNICA','CIENCIAS'=>'CIENCIAS'],null, ['class' => 'form-control']) !!}
                      
                      <div class="input-group-append">
                          <button class="btn btn-info" name="btn_buscar" value="btn_buscar"> <i class="fa fa-search" ></i> </button>
                      </div>
                  </div>
              </form>                
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('materias.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

