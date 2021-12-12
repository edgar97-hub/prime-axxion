@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             
          </li>
           
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
                              {!! Form::model($our_information, ['route' => ['nosotrosdetalles.update', $our_information->id], 'method' => 'patch', 'files' => true]) !!}

                               

                                @if($our_information->nosotros_id == 1)
                                   @include('nosotrosdetalles.sections.azul.fields')
                                 @endif

                                 @if($our_information->nosotros_id == 2)

                                 @endif

                                 @if($our_information->nosotros_id == 3)
                                  @include('nosotrosdetalles.sections.somospartede.fields')
                                 @endif

                                 @if($our_information->nosotros_id == 4)

                                 @endif

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection