@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a >Nosotros detalles</a>
            </li>
            <li class="breadcrumb-item active">Detalles</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Detalles</strong>
                                  <a 

                                  href="{{ route('nosotrosdetalles.section', [$our_details->id]) }}"
                                  class="btn btn-light">atrás</a>
                             </div>
                             <div class="card-body">
                                  

                                 @if($our_details->id == 1)
                                   @include('nosotrosdetalles.sections.azul.show_fields')
                                 @endif

                                 @if($our_details->id == 2)

                                 @endif

                                 @if($our_details->id == 3)
                                  @include('nosotrosdetalles.sections.somospartede.show_fields')
                                 @endif

                                 @if($our_details->id == 3)

                                 @endif
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
