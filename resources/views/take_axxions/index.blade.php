@extends('layouts.app')

@section('content')
 
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Lista</li>
      <li class="breadcrumb-item">
        <a href="#">Take Axxion</a>
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
                             Take Axxion
                             <a class="pull-right" href="{{ route('takeAxxions.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body">
                             @include('take_axxions.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

