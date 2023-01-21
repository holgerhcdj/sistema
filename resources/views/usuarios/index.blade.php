@extends('layouts.app')
@section('title')
    Administración de Usuarios 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Usuarios</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('usuarios.create')}}" class="btn btn-primary form-btn">Usuarios <i class="fas fa-plus"></i></a>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @if(session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
              </div>
              @endif
                <form action="{{ route('usuarios.index') }}" method="POST">
                    @csrf
                    <div class="input-group ">
                        <div class="input-group-prepend">
                          <span class="input-group-text font-weight-bold">Usuario</span>
                      </div>
                      {!! Form::text('usuario',null, ['class' => 'form-control','placeholder'=>'Nombre del Usuario']) !!}

                      <div class="input-group-prepend">
                          <span class="input-group-text font-weight-bold">Perfil</span>
                      </div>
                      {!! Form::select('perfil',['0'=>'--Todos--','1'=>'Administrador','2'=>'Docente'],null, ['class' => 'form-control']) !!}
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
                @include('usuarios.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

