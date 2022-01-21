@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
      <li class="breadcrumb-item">Lista</li>
      <li class="breadcrumb-item">
        <a href="#">Tarjetas</a>
      </li>
      <li class="breadcrumb-item active">Nuevo</li>
    </ol>

    <div id = "allMessage" style="display:none"  class="alert alert-danger" >
    <strong>¡Ups!</strong> Hubo algunos problemas con tu entrada.<br><br>
    <ul style="list-style-type: none">
         <li id = "message_titulolight"></li>
         <li id = "message_titulonegrita"></li>
         <li id = "message_img"></li>
    </ul>
  </div>
 



     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Crear</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'solutions.storeCard', 'files' => true]) !!}

                                   @include('solutions.cards.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
