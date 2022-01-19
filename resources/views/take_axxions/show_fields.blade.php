<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Categoría:') !!}
    <p>{{ $takeAxxion[0]->get_category->name_category }}</p>
</div>

<!-- Level Field -->
<div class="form-group">
    {!! Form::label('level', 'Nivel:') !!}

    @if($takeAxxion[0]->level == 'basic')
      <p>{{ 'Básico' }}</p>
    @endif
    @if($takeAxxion[0]->level == 'intermediate')
      <p>{{ 'Intermedio' }}</p>
    @endif
    @if($takeAxxion[0]->level == 'advanced')
      <p>{{ 'Avanzado' }}</p>
    @endif
</div>

<!-- Number Visits Field -->
<div class="form-group">
    {!! Form::label('number_visits', 'Número de visitas:') !!}
    <p>{{ $takeAxxion[0]->number_visits }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Título:') !!}
    <p>{{ $takeAxxion[0]->title }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Usuario creador del blog:') !!}
    <p>{{ $takeAxxion[0]->get_user->name }}</p>
</div>

<!-- Light Text 1 Field -->
<div class="form-group">
    {!! Form::label('light_text_1', 'Breve descripción:') !!}
    <p>{!! $takeAxxion[0]->short_description !!}</p>
</div>

<!-- Img 1 Field -->
<div class="form-group">
    {!! Form::label('img_1', 'Img:') !!}
    <p> <img height="200" src="{{ asset('storage/'.$takeAxxion[0]->img) }}" alt="" title=""></p>

</div>

<!-- Body Field -->
<div  class="form-group">
    {!! Form::label('body', 'cuerpo del blog:') !!}

    {!! Form::textarea('body', $takeAxxion[0]->body, ['id'=>'hidden_body_field','style'=>'display:none','class' => 'form-control']) !!}
</div>


<div id="document-editor" >

  <div id="toolbar-container">
    {!! Form::label('body', 'cuerpo del blog:') !!}
  </div>

  <div  id="editor"  class="form-group col-sm-12 col-lg-12">
      {!! Form::textarea('body', null, ['id'=>'editorText','class' => 'form-control']) !!}
  </div>
  
</div>



<!-- Video Field -->
<div class="form-group">
    {!! Form::label('video', 'Video 1:') !!}
    <p>{{ $takeAxxion[0]->video_1 }}</p>
</div>

<div class="form-group">
    {!! Form::label('video', 'Video 2:') !!}
    <p>{{ $takeAxxion[0]->video_2 }}</p>
</div>


<!-- Podcast Field -->
<div class="form-group">
    {!! Form::label('podcast', 'Podcast:') !!}
    <p>{{ $takeAxxion[0]->podcast }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha de creación:') !!}
    <p>{{ $takeAxxion[0]->created_at }}</p>
</div>
 

