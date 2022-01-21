@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
     
     <li class="breadcrumb-item">
       <a href="#">Titulo</a>
     </li>
     <li class="breadcrumb-item active">Editar</li>
   </ol>

   <div id = "allMessage" style="display:none"  class="alert alert-danger" >
    <strong>¡Ups!</strong> Hubo algunos problemas con tu entrada.<br><br>
    <ul style="list-style-type: none">
         <li id = "message"></li>
    </ul>
  </div>

  
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Editar</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($solution, ['route' => ['solutions.update', $solution->id], 'method' => 'patch', 'files' => true]) !!}

                              @include('solutions.title.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection