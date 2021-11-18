@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('users.index') !!}">Usuario</a>
      </li>
      <li class="breadcrumb-item active">Crear</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Crear Usuario</strong>
                            </div>
                            <div class="card-body">
                               
                                {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
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
                                          <strong>Contraseña:</strong>
                                          {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                                         </div>
                                     </div>
                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                              <strong>Confirmar Contraseña:</strong>
                                              {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                                           </div>
                                     </div>
                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                         <div class="form-group">
                                            <strong>Role:</strong>

                                            
                                            <select name="roles" id="roles" class="form-control">
                                                @foreach($roles as $role)
                                                 <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                              
                                            </select>
                                             
                                         </div>
                                    </div>
                                     <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                         <button type="submit" class="btn btn-primary">Submit</button>
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
