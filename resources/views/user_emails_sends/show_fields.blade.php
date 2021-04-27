<!-- Destinatario Field -->
<div class="form-group">
    {!! Form::label('destinatario', 'Destinatario:') !!}
    <p>{{ $userEmailsSend->destinatario }}</p>
</div>

<!-- Asunto Field -->
<div class="form-group">
    {!! Form::label('asunto', 'Asunto:') !!}
    <p>{{ $userEmailsSend->asunto }}</p>
</div>

<!-- Mensaje Field -->
<div class="form-group">
    {!! Form::label('mensaje', 'Mensaje:') !!}
    <p>{{ $userEmailsSend->mensaje }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $userEmailsSend->status }}</p>
</div>

