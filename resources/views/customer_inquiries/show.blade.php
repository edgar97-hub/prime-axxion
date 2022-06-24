@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
           
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Detalles</strong>
                                  <a href="{{ route('customerInquiries.index') }}" class="btn btn-light">atrás</a>
                             </div>
                             <div class="card-body">
                                 @include('customer_inquiries.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
