<!-- Img Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img', 'Img:') !!}
    {!! Form::file('img') !!}
</div>
<div class="clearfix"></div>

<!-- Our Id Field -->
<div class="form-group col-sm-6">
  
    {!! Form::number('our_id', $img_id, ['class' => 'form-control','style'=>'display:none']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('imgs.getTextImg',$img_id) }}" class="btn btn-secondary">Cancelar</a>
</div>
