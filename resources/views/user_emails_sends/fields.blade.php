<!-- Destinatario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destinatario', 'Destinatario:') !!}
    {!! Form::text('destinatario', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Asunto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('asunto', 'Asunto:') !!}
    {!! Form::text('asunto', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Mensaje Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('mensaje', 'Mensaje:') !!}
    {!! Form::textarea('mensaje', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('userEmailsSends.index') }}" class="btn btn-secondary">Cancel</a>
</div>
