@extends('layouts.app')
@section('title')
    Create Horarios 
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading m-0">New Horarios</h3>
            <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                <a href="{{ route('horarios.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="content">
            @include('stisla-templates::common.errors')
            <div class="section-body">
               <div class="row">
                                {!! Form::open(['route' => 'horarios.store']) !!}
                                    <div class="row">
                                        @include('horarios.fields')
                                    </div>
                                {!! Form::close() !!}
               </div>
            </div>
        </div>
    </section>
@endsection
