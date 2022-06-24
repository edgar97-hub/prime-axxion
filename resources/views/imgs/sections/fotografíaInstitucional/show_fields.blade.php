<!-- Textitle Field -->
<div class="form-group">
    {!! Form::label('textitle', 'titulo:') !!}
    <p>{{ $img->textitle }}</p>
</div>

<!-- Img Field -->
<div class="form-group">
    {!! Form::label('img', 'Img:') !!}
    <p><img height="200" src="{{ asset('storage/'.$img->img) }}" alt="" title=""></p>
</div>

 
 
