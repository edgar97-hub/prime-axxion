<!-- Titulolight Field -->
<div class="form-group">
    {!! Form::label('titulolight', 'Titulo Ligero:') !!}
    <p>{{ $banner->titulolight }}</p>
</div>

<!-- Titulonegrita Field -->
<div class="form-group">
    {!! Form::label('titulonegrita', 'Título en negrita:') !!}
    <p>{{ $banner->titulonegrita }}</p>
</div>

<!-- Textogeneral Field -->
<div class="form-group">
    {!! Form::label('textogeneral', 'Texto general:') !!}
    <p>{{ $banner->textogeneral }}</p>
</div>

<!-- Img Field -->
<div class="form-group">
    {!! Form::label('img', 'Img:') !!}
    <p> <img height="200" src="{{ asset('storage/'.$banner->img) }}" alt="" title=""></p>
   
</div>
 