@extends('layouts.app')


@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-item">Roles</li>
    </ol>
    @include('flash::message')
<div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Role
                             <a class="pull-right" href="{{ route('roles.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body">
                         @include('roles.table')

                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>


 

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif






@endsection