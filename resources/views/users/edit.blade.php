@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
              
          </li>
         
        </ol>


        @if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>¡Ups!</strong> Hubo algunos problemas con tu entrada.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nombre:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>contraseña:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirmar contraseña:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Rol:</strong>
            <select name="roles" id="roles" class="form-control">
                                                @foreach($roles as $role)
                                                  @if ($role->name == $userRole[0]->name)
                                                      <option selected value="{{ $role->name }}">{{ $role->name}}</option>
                                                  @else
                                                     <option value="{{ $role->name }}">{{ $role->name}}</option>
                                                  @endif
                                                 
                                                @endforeach
                                              
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
 
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
{!! Form::close() !!}

 
@endsection