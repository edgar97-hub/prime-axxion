<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Titulo:') !!}
    <p>{{ $solution->title }}</p>
</div>

<!-- Titulolight Field -->
<div class="form-group">
    {!! Form::label('titulolight', 'Titulo Ligero:') !!}
    <p>{{ $solution->titulolight }}</p>
</div>

<!-- Titulonegrita Field -->
<div class="form-group">
    {!! Form::label('titulonegrita', 'Título en negrita:') !!}
    <p>{{ $solution->titulonegrita }}</p>
</div>

<!-- Img Field -->
<div class="form-group">
    {!! Form::label('img', 'Img:') !!}
    <p><img height="200" src="{{ asset('storage/'.$solution->img) }}" alt="" title=""></p>
    
</div> 

