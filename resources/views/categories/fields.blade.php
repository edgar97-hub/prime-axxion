<!-- Name Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_category', 'Categoría:') !!}
    {!! Form::text('name_category', null, ['id' => 'nameCategory','class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('img', 'img:') !!}
    {!! Form::file('img') !!}
</div>

<div class="form-group col-sm-6">
<span id = "message_nameCategory" style="color:red"> </span> 
</div>

<div class="form-group col-sm-6">
<span id = "message_img" style="color:red"> </span>  
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['id'=>'save_category','class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="{{ asset('auto.js') }}"></script>