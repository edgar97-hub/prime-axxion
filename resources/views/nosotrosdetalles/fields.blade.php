<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Campo de título ligero:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Textcolumn1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('textcolumn1', 'campo de texto 1 :') !!}
    {!! Form::text('textcolumn1', null, ['class' => 'form-control']) !!}
</div>

<!-- Textcolumn2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('textcolumn2', 'campo de texto 2:') !!}
    {!! Form::text('textcolumn2', null, ['class' => 'form-control']) !!}
</div>

<!-- Textitle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('textitle', 'Campo de título negrita:') !!}
    {!! Form::text('textitle', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img', 'Img:') !!}
    {!! Form::file('img') !!}
</div>
<div class="clearfix"></div>

<!-- Nosotros Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nosotros_id', 'Sección:') !!}
    
    {!! Form::number('nosotros_id', null, ['id' => 'nosotros_id','class' => 'form-control','style'=>'display:none']) !!}

    {!! Form::text('author', null, ['id' => 'Autor_Impersonated' ,'class' => 'form-control']) !!}
    <div id="vendor_list_2"></div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('nosotrosdetalles.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>
<script src="{{ asset('auto.js') }}"></script>