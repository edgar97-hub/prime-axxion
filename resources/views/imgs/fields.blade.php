<!-- Textitle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('textitle', 'Textitle:') !!}
    {!! Form::text('textitle', null, ['class' => 'form-control']) !!}
</div>

<!-- Img Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img', 'Img:') !!}
    {!! Form::file('img') !!}
</div>
<div class="clearfix"></div>

<!-- Our Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('our_id', 'Our Id:') !!}
    {!! Form::number('our_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('imgs.index') }}" class="btn btn-secondary">Cancel</a>
</div>
