<!-- Seccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('seccion', 'Sección:') !!}
    {!! Form::text('seccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('nosotros.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
