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
                                 <strong>Detalle</strong>
                                  <a href="{{ route('imgs.getTextImg',$img->our_id) }}" class="btn btn-light">atrás</a>
                             </div>
                             <div class="card-body">
                                
                             

                                 @if($img->our_id == 2)
                                  @include('imgs.sections.fotografíaInstitucional.show_fields')
                                 @endif

                                 @if($img->our_id == 3)
                                   @include('imgs.sections.somospartede.show_fields')
                                 @endif

                                 @if($img->our_id == 4)
                                   @include('imgs.sections.bancos.show_fields')
                                 @endif
                            
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
