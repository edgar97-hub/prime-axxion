<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Titulo:') !!}
    {!! Form::text('title', null, ['id' => 'title','class' => 'form-control']) !!}
</div>

 

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['id'=>'saveTitle', 'class' => 'btn btn-primary']) !!}
    <a href="{{ route('solutions.getView',1) }}" class="btn btn-secondary">Cancelar</a>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>

<script src="{{ asset('auto.js') }}"></script>