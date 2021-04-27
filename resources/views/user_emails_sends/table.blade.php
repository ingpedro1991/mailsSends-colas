<div class="table-responsive-sm">
    <table class="table table-striped" id="userEmailsSends-table">
        <thead>
            <tr>
                <th>Destinatario</th>
                <th>Asunto</th>
                <th>Mensaje</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($userEmailsSends as $userEmailsSend)
            @if (Auth::user()->id == $userEmailsSend->user_id )
                <tr>
                    <td>{{ $userEmailsSend->destinatario }}</td>
                    <td>{{ $userEmailsSend->asunto }}</td>
                    <td>{{ $userEmailsSend->mensaje }}</td>
                    <td>{{ $userEmailsSend->status }}</td>
                    <td>
                        {!! Form::open(['route' => ['userEmailsSends.destroy', $userEmailsSend->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('userEmailsSends.show', [$userEmailsSend->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                            <!-- <a href="{{ route('userEmailsSends.edit', [$userEmailsSend->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a> -->
                            <!-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>