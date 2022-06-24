<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Titulo:') !!}
    <p>{{ $calltoAction->title }}</p>
</div>

<!-- Img Field -->
<div class="form-group">
    {!! Form::label('img', 'Video:') !!}
    <p><video width="500" height="280" poster="https://www.salesforce.com/content/dam/web/en_gb/www/images/resources/platform-slack-mobile.png" controls>
  <source src="{{ asset('storage/'.$calltoAction->img) }}" type="video/mp4">

</video> </p>

    
</div>

 