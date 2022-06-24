@extends('layouts.app')

@section('content')
@php
    $img_id = $img->our_id;
@endphp
<ol class="breadcrumb">
        
  
    <li class="breadcrumb-item active">Editar</li>
    </ol>

  <div id = "allMessage" style="display:none"  class="alert alert-danger" >
    <strong>¡Ups!</strong> Hubo algunos problemas con tu entrada.<br><br>
    <ul style="list-style-type: none">
         <li id = "message_title"></li>
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
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Editar</strong>
                              <input type="checkbox" name="answer" id="Edit" style = "display:none"/>
                          </div>
                          <div class="card-body">
                              {!! Form::model($img, ['route' => ['imgs.update', $img->id], 'method' => 'patch', 'files' => true]) !!}
 

                                @if($img->our_id == 2)
                                  @include('imgs.sections.fotografíaInstitucional.fields')
                                @endif

                                @if($img->our_id == 3)
                                  @include('imgs.sections.somospartede.fields')
                                @endif

                                @if($img->our_id == 4)
                                  @include('imgs.sections.bancos.fields')
                                @endif

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>
<script src="{{ asset('auto.js') }}"></script>
