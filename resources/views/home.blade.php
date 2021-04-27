@extends('layouts.app')

@section('content')
  <div class="container-fluid">
        <div class="animated fadeIn">
             <div class="row" style="margin-top: 3rem !important;">
                <div class="container-fluid">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-align-justify"></i>
                                            Profile Information
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Nombre:') !!}
                                            <p>{{ $userLoged->name }}</p>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('cedula', 'Cedula:') !!}
                                            <p>{{ $userLoged->cedula }}</p>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('numero_celular', 'Telefono:') !!}
                                            <p>{{ $userLoged->numero_celular }}</p>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('fecha_nacimiento', 'Edad:') !!}
                                            <p>{{ $edad }}</p>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('email', 'Correo:') !!}
                                            <p>{{ $userLoged->email }}</p>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('rol_id', 'Rol:') !!}
                                                @if ($userLoged->rol_id == 1 )
                                                    <p>Admin</p>
                                                @else
                                                    <p>User</p>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
