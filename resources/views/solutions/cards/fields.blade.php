<!-- Titulolight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulolight', 'Titulo Ligero:') !!}
    {!! Form::text('titulolight', null, ['class' => 'form-control']) !!}
</div>

<!-- Titulonegrita Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulonegrita', 'Título en negrita:') !!}
    {!! Form::text('titulonegrita', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img', 'Img:') !!}
    {!! Form::file('img') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('solutions.getView',2) }}" class="btn btn-secondary">Cancelar</a>
</div>
