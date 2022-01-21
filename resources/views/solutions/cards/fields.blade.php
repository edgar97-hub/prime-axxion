<!-- Titulolight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulolight', 'Titulo Ligero:') !!}
    {!! Form::text('titulolight', null, ['id' => 'titulolight','class' => 'form-control']) !!}
</div>

<!-- Titulonegrita Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titulonegrita', 'Título en negrita:') !!}
    {!! Form::text('titulonegrita', null, ['id' => 'titulonegrita','class' => 'form-control']) !!}
</div>

<!-- Img Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img', 'Img:') !!}
    {!! Form::file('img') !!}
</div>
<div class="clearfix"></div>

<div class="form-group col-sm-6">
<span id = "message_titulolight" style="color:red"> </span>  
</div>

<div class="form-group col-sm-6">
<span id = "message_titulonegrita" style="color:red"> </span>  
</div>

<div class="form-group col-sm-6">
<span id = "message_img" style="color:red"> </span>  
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['id'=>'saveCard','class' => 'btn btn-primary']) !!}
    <a href="{{ route('solutions.getView',2) }}" class="btn btn-secondary">Cancelar</a>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="{{ asset('auto.js') }}"></script>

 

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>

<script src="{{ asset('auto.js') }}"></script>

