<!-- Textitle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('textitle', 'titulo:') !!}
    {!! Form::text('textitle', null, ['id' => 'textitle','class' => 'form-control']) !!}
</div>

<!-- Img Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img', 'Img:') !!}
    {!! Form::file('img',['id' => 'img']) !!}
</div>
<div class="clearfix"></div>

<div class="form-group col-sm-6">
  
    {!! Form::number('our_id', $img_id, ['class' => 'form-control','style'=>'display:none']) !!}
</div>

<div class="form-group col-sm-6">
<span id = "qq" style="color:red"> </span> 
</div>

<div class="form-group col-sm-6">
<span id = "qq" style="color:red"> </span>  
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['id'=>'saveSeccionPhotoInstitutional','class' => 'btn btn-primary']) !!}
    <a href="{{ route('imgs.getTextImg',$img_id) }}" class="btn btn-secondary">Cancelar</a>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>
<script src="{{ asset('auto.js') }}"></script>