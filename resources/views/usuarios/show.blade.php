@extends('layouts.app')
@section('title')
    Cambiar clave del Usuario  
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
        <h1>Cambiar clave del Usuario </h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('usuarios.index') }}"
                 class="btn btn-primary form-btn float-right">Back</a>
        </div>
      </div>
   @include('stisla-templates::common.errors')
    <div class="section-body">
           <div class="card">
            <div class="card-body">

                {!! Form::model($usuarios, ['route' => ['usuarios.update', $usuarios->id], 'method' => 'patch']) !!}
                <div class="row">
                    @include('usuarios.show_fields')
                </div>

                {!! Form::close() !!}

            </div>
            </div>
    </div>
    </section>
@endsection
