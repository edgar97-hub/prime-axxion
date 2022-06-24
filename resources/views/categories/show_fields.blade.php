<!-- Name Category Field -->
<div class="form-group">
    {!! Form::label('name_category', 'Categoría:') !!}
    <p>{{ $category->name_category }}</p>
</div>
<div class="form-group">
    {!! Form::label('img', 'img:') !!}
    <p> <img height="200" src="{{ asset('storage/'.$category->img) }}" alt="" title=""></p>

</div>

