@extends('layouts.app')
@section('title')
    Cursos 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Cursos</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('cursos.create')}}" class="btn btn-primary form-btn">Cursos <i class="fas fa-plus"></i></a>
            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
                @include('cursos.table')
            </div>
       </div>
   </div>
    
    </section>
@endsection

