@extends('layouts.app')
@section('title')
    Carreras 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Carreras</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('carreras.create')}}" class="btn btn-primary form-btn">Carreras <i class="fas fa-plus"></i></a>
            </div>
        </div>
        <div class="container">
            <div class="row">

                <form action="{{ route('carreras.index') }}" method="POST">
                    @csrf
                    <div class="input-group ">
                      <div class="input-group-prepend">
                          <span class="input-group-text font-weight-bold">Carrera</span>
                      </div>
                        {!! Form::text('carrera',null, ['class' => 'form-control','placeholder'=>'Nombre de la Carrera','required'=>'required']) !!}
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
                @include('carreras.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

