@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        
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
                                <strong>Nosotros detalles</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'nosotrosdetalles.store', 'files' => true]) !!}

                                    
                                 @if($our_information == 1)
                                   @include('nosotrosdetalles.sections.azul.fields')
                                 @endif

                                 @if($our_information == 2)
                                  @include('nosotrosdetalles.sections.fotografíaInstitucional.fields')
                                 @endif

                                 @if($our_information == 3)
                                  @include('nosotrosdetalles.sections.somospartede.fields')

                                 @endif

                                 @if($our_information == 4)
                                  @include('nosotrosdetalles.sections.bancos.fields')
                                 @endif

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
