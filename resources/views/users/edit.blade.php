@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
      <li class="breadcrumb-item">Lista</li>
      <li class="breadcrumb-item">
        <a href="#">Administradores</a>
      </li>
      <li class="breadcrumb-item active">Editar</li>
    </ol>


  @if (count($errors) > 0)
  <div style="display:none"  class="alert alert-danger">
    <strong>¡Ups!</strong> Hubo algunos problemas con tu entrada.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif
<div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Editar</strong>
                            </div>
                            <div class="card-body">
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
                                  @if ($role->name == $user->role)
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
                              <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
                              </div>
                              </div>
                              {!! Form::close() !!}
</div>
                        </div>
                    </div>
                </div>
           </div>
    </div>

 
@endsection