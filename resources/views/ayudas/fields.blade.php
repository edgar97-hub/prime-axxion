<!-- Pregunta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pregunta', 'Pregunta:') !!}
    {!! Form::text('pregunta', null, ['class' => 'form-control']) !!}
</div>

<!-- Respuesta Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('respuesta', 'Respuesta:') !!}
    {!! Form::textarea('respuesta', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('ayudas.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
