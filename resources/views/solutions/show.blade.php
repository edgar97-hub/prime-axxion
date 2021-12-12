@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('solutions.index') }}">solutions</a>
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
                                  <a href="{{ route('solutions.index') }}" class="btn btn-light">atrás</a>
                             </div>
                             <div class="card-body">
                                 
                                @if($id == 1)
                                  @include('solutions.title.show_fields')
                                @endif

                                @if($id == 2)
                                  @include('solutions.cards.show_fields')
                                @endif
 
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
