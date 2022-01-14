<!-- Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Categoría:') !!}
    {!! Form::number('category_id', null, ['id' => 'category','style'=>'display:none','class' => 'form-control']) !!}

    <div class="form-group">
        <select name="category_field_2" id="category_field_2" class="form-control" onchange="getSelectValueCategory(this)">
            @foreach($categories as $categoria)
              

              @if ($categoria->id == $takeAxxion->category_id)
              <option selected  data-id="{{$categoria->id}}" value="{{ $categoria->name_category }}">{{ $categoria->name_category }}</option>
               @else
              <option data-id="{{$categoria->id}}" value="{{ $categoria->name_category }}">{{ $categoria->name_category }}</option>
               @endif

            @endforeach
        </select>
      </div>
</div>

<!-- Number Visits Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number_visits', 'Número de visitas:') !!}
    {!! Form::number('number_visits', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('Nivel', 'Nivel:') !!}

    <select name="level" id="level" class="form-control">
        @foreach($levels as $level)
          @if ($level == $takeAxxion->level)
              <option selected value="{{ $level }}">{{ $level}}</option>
          @else
              <option value="{{ $level }}">{{ $level}}</option>
          @endif
        @endforeach

    </select>
</div>


<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Usuario creador del blog:') !!}
    {!! Form::number('user_id', null, ['id' => 'user','style'=>'display:none','class' => 'form-control']) !!}

    <div class="form-group">
        <select name="user_field_2" id="user_field_2" class="form-control" onchange="getSelectValueUser(this)">
            @foreach($users as $user)
              

              @if ($user->id == $takeAxxion->user_id)
              <option selected  data-id="{{$user->id}}" value="{{ $user->name }}">{{ $user->name }}</option>
               @else
              <option data-id="{{$user->id}}" value="{{ $user->name }}">{{ $user->name }}</option>
               @endif

            @endforeach
        </select>
      </div>


</div>

<!-- Light Text 1 Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('short_description', 'Breve descripción:') !!}
    {!! Form::textarea('short_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Img 1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('img', 'img :') !!}
    {!! Form::file('img') !!}
</div>
<div class="clearfix"></div>


<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('body', 'cuerpo del blog:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>



<!-- Video Field -->
<div class="form-group col-sm-6">
    {!! Form::label('video', 'Video 1:') !!}
    {!! Form::text('video_1', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('video', 'Video 2:') !!}
    {!! Form::text('video_2', null, ['class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>

<!-- Podcast Field -->
<div class="form-group col-sm-6">
    {!! Form::label('podcast', 'Podcast:') !!}
    {!! Form::text('podcast', null, ['class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('takeAxxions.index') }}" class="btn btn-secondary">Cancelar</a>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>

 


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