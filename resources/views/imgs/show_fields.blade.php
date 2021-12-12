<!-- Textitle Field -->
<div class="form-group">
    {!! Form::label('textitle', 'Textitle:') !!}
    <p>{{ $img->textitle }}</p>
</div>

<!-- Img Field -->
<div class="form-group">
    {!! Form::label('img', 'Img:') !!}
    <p>{{ $img->img }}</p>
</div>

<!-- Our Id Field -->
<div class="form-group">
    {!! Form::label('our_id', 'Our Id:') !!}
    <p>{{ $img->our_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $img->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $img->updated_at }}</p>
</div>

