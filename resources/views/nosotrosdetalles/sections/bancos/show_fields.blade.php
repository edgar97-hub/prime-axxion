<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $nosotrosdetalles->title }}</p>
</div>

<!-- Textcolumn1 Field -->
<div class="form-group">
    {!! Form::label('textcolumn1', 'Textcolumn1:') !!}
    <p>{{ $nosotrosdetalles->textcolumn1 }}</p>
</div>

<!-- Textcolumn2 Field -->
<div class="form-group">
    {!! Form::label('textcolumn2', 'Textcolumn2:') !!}
    <p>{{ $nosotrosdetalles->textcolumn2 }}</p>
</div>

<!-- Textitle Field -->
<div class="form-group">
    {!! Form::label('textitle', 'Textitle:') !!}
    <p>{{ $nosotrosdetalles->textitle }}</p>
</div>

<!-- Img Field -->
<div class="form-group">
    {!! Form::label('img', 'Img:') !!}
    <p><img height="200" src="{{ asset('storage/'.$nosotrosdetalles->img) }}" alt="" title=""></p>
    
</div>

<!-- Nosotros Id Field -->
<div class="form-group">
    {!! Form::label('nosotros_id', 'Sección:') !!}
    <p>{{ $nosotrosdetalles->seccion }}</p>
</div>
 
