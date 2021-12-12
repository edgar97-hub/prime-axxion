@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
         
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Sección azul
                             <a class="pull-right" href="{{ route('nosotrosdetalles.createourimformation', $our_information->data->id) }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body">

                         
                                 @if($our_information->data->id == 1)
                                  @include('nosotrosdetalles.sections.azul.table')
                                 @endif

                                 @if($our_information->data->id == 2)
                                  @include('nosotrosdetalles.sections.fotografíaInstitucional.table')
                                 @endif

                                 @if($our_information->data->id == 3)
                                   @include('nosotrosdetalles.sections.somospartede.table')
                                 @endif

                                 @if($our_information->data->id == 4)
                                   @include('nosotrosdetalles.sections.bancos.table')
                                 @endif
                            
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

