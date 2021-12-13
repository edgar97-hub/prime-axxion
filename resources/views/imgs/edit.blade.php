@extends('layouts.app')

@section('content')
@php
    $img_id = $img->our_id
@endphp
<ol class="breadcrumb">
        
  
      <li class="breadcrumb-item active">Editar</li>
    </ol>
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