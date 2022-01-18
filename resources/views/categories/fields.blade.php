<!-- Name Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_category', 'Categoría:') !!}
    {!! Form::text('name_category', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('img', 'img:') !!}
    {!! Form::file('img') !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
