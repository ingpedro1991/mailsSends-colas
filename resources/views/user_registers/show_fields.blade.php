<!-- {{ $userRegister  }} -->
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $userRegister->name }}</p>
</div>

<!-- Cedula Field -->
<div class="form-group">
    {!! Form::label('cedula', 'Cedula:') !!}
    <p>{{ $userRegister->cedula }}</p>
</div>

<!-- Numero Celular Field -->
<div class="form-group">
    {!! Form::label('numero_celular', 'Numero Celular:') !!}
    <p>{{ $userRegister->numero_celular }}</p>
</div>

<!-- Edad Field -->
<div class="form-group">
    {!! Form::label('fecha_nacimiento', 'Edad:') !!}
    <p>{{ $userRegister->edad }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $userRegister->email }}</p>
</div>

<!-- Rol Id Field -->
<div class="form-group">
    {!! Form::label('rol_id', 'Rol:') !!}
        @if ($userRegister->rol_id == 1 )
            <p>Admin</p>
        @else
            <p>User</p>
        @endif
</div>

