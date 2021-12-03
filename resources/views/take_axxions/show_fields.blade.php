<!-- Img Field -->

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $takeAxxion->title }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $takeAxxion->description }}</p>
</div>

<div class="form-group">
    {!! Form::label('img', 'Img:') !!}
    <p> <img height="200" src="{{ asset('storage/'.$takeAxxion->img) }}" alt="" title=""></p>
   
</div>



