@extends('layouts.app')

@section('content')
@php
    $seccion = $imgs[0]->seccion
@endphp
<ol class="breadcrumb">
      
        <a href="#">{{$imgs[0]->seccion}}</a>
      </li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             {{ $imgs[0]->seccion}}
                             <a class="pull-right" href="{{ route('imgs.createTextImg',$imgs[0]->id) }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body">
                          
                          
                        @if(!is_null($imgs[0]->img_id))
                          @if($imgs[0]->id == 2)
                            @include('imgs.sections.fotografíaInstitucional.table')
                          @endif

                          @if($imgs[0]->id == 3)
                            @include('imgs.sections.somospartede.table')
                          @endif

                          @if($imgs[0]->id == 4)
                            @include('imgs.sections.bancos.table')
                          @endif
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

