@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
    <li class="breadcrumb-item">Lista</li>
      <li class="breadcrumb-item">
        <a href="#">Consultas de Clientes</a>
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
                             Consultas de Clientes
                             
                         </div>
                         <div class="card-body">
                             @include('customer_inquiries.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

