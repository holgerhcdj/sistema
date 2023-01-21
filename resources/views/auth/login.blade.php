@extends('layouts.auth_app')
<?php 
$car_id=0;
if($op==0){
    $title='SuperAdministrador';
    $htitle="SuperAdministrador <i class='fas fa-user-secret'></i> ";
    $hidden_carrera="hidden";
}
if($op==1){
    $title='Administrador de Carrera';
    $htitle="Administrador de Carrera <i class='fas fa-user-cog'></i>";
    $hidden_carrera="";
}
if($op==2){
    $title='Docente';
    $htitle="Docente <i class='fas fa-user-graduate'></i>";
    $hidden_carrera="";
}
?>
@section('title')
{{ $title }}
@endsection
@section('content')
    <div class="card card-primary">
        <div class="card-header"><h4>{!! $htitle !!}</h4></div>

        <div class="card-body">
            <form method="POST" action="{{ route('login_form') }}">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger p-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="form-group">
                    <div id="cont_carrera" {{ $hidden_carrera }} >
                        <label for="car_id"><strong class="text-danger">Carrera *</strong></label>
                        {!! Form::select('car_id',$carreras,$car_id, ['class' => 'form-control']) !!}
                        {!! Form::hidden('op',$op,['class' => 'form-control']) !!}
                    </div>
                    
                    <label for="email">Email</label>
                    <input aria-describedby="emailHelpBlock" id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           placeholder="Enter Email" tabindex="1"
                           value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}" autofocus
                           required>
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                    </div>
                    <input aria-describedby="passwordHelpBlock" id="password" type="password"
                           placeholder="Enter Password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid': '' }}" name="password"
                           tabindex="2" required>
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
