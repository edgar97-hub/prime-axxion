<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Categoría:') !!}
    {!! Form::number('category_id', null, ['id' => 'category','style'=>'display:none','class' => 'form-control']) !!}

    <div class="form-group">
        <select name="category_field_2" id="category_field_2" class="form-control" onchange="getSelectValueCategory(this)">
            @foreach($categories as $categoria)
              

              @if ($categoria->id == $takeAxxion->category_id)
              <option selected  data-id="{{$categoria->id}}" value="{{ $categoria->id }}">{{ $categoria->name_category }}</option>
               @else
              <option data-id="{{$categoria->id}}" value="{{ $categoria->id }}">{{ $categoria->name_category }}</option>
               @endif

            @endforeach
        </select>
      </div>
</div>

<!-- Number Visits Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number_visits', 'Número de visitas:',['style'=>'display:none']) !!}
    {!! Form::number('number_visits', null, ['style'=>'display:none','class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('Nivel', 'Nivel:') !!}

    <select name="level" id="level" class="form-control">
        @foreach($levels as $level)
          @if ($level == $takeAxxion->level)
            @if($level == 'basic')
            <option selected value="{{ $level }}">{{ 'Básico'}}</option>
            @endif
            @if($level == 'intermediate')
              <option selected value="{{ $level }}">{{ 'Intermedio'}}</option>
            @endif
            @if($level == 'advanced')
              <option selected value="{{ $level }}">{{ 'Avanzado' }}</option>
            @endif
          @else
            @if($level == 'basic')
            <option value="{{ $level }}">{{ 'Básico'}}</option>
            @endif
            @if($level == 'intermediate')
            <option value="{{ $level }}">{{ 'Intermedio'}}</option>
            @endif
            @if($level == 'advanced')
            <option value="{{ $level }}">{{ 'Avanzado'}}</option>
            @endif
          @endif
        @endforeach

    </select>
</div>


<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['style'=>'width:23cm','class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Usuario creador del blog:',['style'=>'display:none']) !!}
    {!! Form::number('user_id', Auth::user()->id, ['id' => 'user','style'=>'display:none','class' => 'form-control']) !!}

    <div class="form-group">
        <select style="display:none" name="user_field_2" id="user_field_2" class="form-control" onchange="getSelectValueUser(this)">
            @foreach($users as $user)
              

              @if ($user->id == $takeAxxion->user_id)
              <option selected  data-id="{{$user->id}}" value="{{ $user->id }}">{{ $user->name }}</option>
               @else
              <option data-id="{{$user->id}}" value="{{ $user->id }}">{{ $user->name }}</option>
               @endif

               
            @endforeach
        </select>
      </div>


</div>

<!-- Img 1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img', 'img :') !!}
    {!! Form::file('img') !!}
</div>

<!-- Light Text 1 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('short_description', 'Breve descripción:') !!}
    {!! Form::textarea('short_description', null, ['class' => 'form-control']) !!}
</div>


<div class="clearfix"></div>




<!-- Video Field -->
<div class="form-group col-sm-6">
    {!! Form::label('video', 'Video 1:') !!}
    {!! Form::text('video_1', null, ['style'=>'width:23cm','class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('video', 'Video 2:') !!}
    {!! Form::text('video_2', null, ['style'=>'width:23cm','class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>

<!-- Podcast Field -->
<div class="form-group col-sm-6">
    {!! Form::label('podcast', 'Podcast:') !!}
    {!! Form::text('podcast', null, ['style'=>'width:23cm','class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::textarea('body', null, ['id'=>'hidden_body_field','style'=>'display:none','class' => 'form-control']) !!}
</div>


<div>

  <div id="toolbar-container">
    {!! Form::label('body', 'cuerpo del blog:') !!}
  </div>

  <div  id="editor"  class="form-group col-sm-12 col-lg-12">
      {!! Form::textarea('body', null, ['id'=>'editorText','class' => 'form-control']) !!}
  </div>
</div>




<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['id'=>'saveTakeAxxion','class' => 'btn btn-primary']) !!}
    <a href="{{ route('takeAxxions.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ asset('auto.js') }}"></script>


 


<script type="text/javascript">
        var category = document.getElementById("category");
        var user = document.getElementById("user");

        function getSelectValueCategory(obj)
        {
          category.value = obj.options[obj.selectedIndex].getAttribute('data-id');

        }
        function getSelectValueUser(obj)
        {
          user.value = obj.options[obj.selectedIndex].getAttribute('data-id');

        }
</script>