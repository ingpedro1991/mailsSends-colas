<div class="table-responsive-sm">
    <table class="table table-striped" id="userRegisters-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Cedula</th>
                <th>Numero Celular</th>
                <th>Fecha Nacimiento</th>
                <th>Email</th>
                <th>Rol</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userRegisters as $userRegister)
            <tr>
                <td>{{ $userRegister->name }}</td>
                <td>{{ $userRegister->cedula }}</td>
                <td>{{ $userRegister->numero_celular }}</td>
                <td>{{ $userRegister->fecha_nacimiento }}</td>
                <td>{{ $userRegister->email }}</td>
                <div class="form-group">
                        @if ($userRegister->rol_id == 1 )
                            <td>Admin</td>
                        @else
                            <td>User</td>
                        @endif
                </div>
                <td>
                    {!! Form::open(['route' => ['userRegisters.destroy', $userRegister->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('userRegisters.show', [$userRegister->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('userRegisters.edit', [$userRegister->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        @if ($userRegister->rol_id != 1 )
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>