<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'título ligero:') !!}
    {!! Form::text('title', null, ['id' => 'title','class' => 'form-control']) !!}
</div>

<!-- Textcolumn1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('textcolumn1', 'breve texto 1 :') !!}
    {!! Form::textarea('textcolumn1', null, ['class' => 'form-control']) !!}
</div>

<!-- Textcolumn2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('textcolumn2', 'breve texto 2:') !!}
    {!! Form::textarea('textcolumn2', null, ['class' => 'form-control']) !!}
</div>

 <!-- Nosotros Id Field -->
<div class="form-group col-sm-6">
    {!! Form::number('nosotros_id', 1, ['id' => 'nosotros_id','class' => 'form-control','style'=>'display:none']) !!}
</div>

<div class="form-group col-sm-6">
<span id = "message" style="color:red"> </span>  
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['id'=>'saveSeccionAzul','class' => 'btn btn-primary']) !!}
    <a href="{{ route('nosotrosdetalles.section', 1) }}" class="btn btn-secondary">Cancelar</a>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>
<script src="{{ asset('auto.js') }}"></script>

 