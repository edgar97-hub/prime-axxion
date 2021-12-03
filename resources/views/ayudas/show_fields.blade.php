<!-- Pregunta Field -->
<div class="form-group">
    {!! Form::label('pregunta', 'Pregunta:') !!}
    <p>{{ $ayuda->pregunta }}</p>
</div>

<!-- Respuesta Field -->
<div class="form-group">
    {!! Form::label('respuesta', 'Respuesta:') !!}
    <p>{{ $ayuda->respuesta }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $ayuda->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $ayuda->updated_at }}</p>
</div>

