<!-- Nosotros Id Field -->
<div class="form-group">
    {!! Form::label('nosotros_id', 'Sección:') !!}
    <p>{{ $our_details->seccion }}</p>
</div>
 
<!-- Img Field -->
<div class="form-group">
    {!! Form::label('img', 'Img:') !!}
    <p><img height="200" src="{{ asset('storage/'.$our_details->img) }}" alt="" title=""></p>
    
</div>


