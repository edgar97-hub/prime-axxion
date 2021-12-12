@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
            
            </li>
            <li class="breadcrumb-item active">Detalle</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Details</strong>
                                  <a href="{{ route('solutions.getView',2) }}" class="btn btn-light">atrás</a>
                             </div>
                             <div class="card-body">
                                 
                                
                                  @include('solutions.cards.show_fields')
                                 
 
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
