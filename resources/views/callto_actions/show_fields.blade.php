<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Titulo:') !!}
    <p>{{ $calltoAction->title }}</p>
</div>

<!-- Img Field -->
<div class="form-group">
    {!! Form::label('img', 'Img:') !!}
    <p><img height="200" src="{{ asset('storage/'.$calltoAction->img) }}" alt="" title=""></p>
</div>

 