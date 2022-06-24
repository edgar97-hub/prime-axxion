@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('nosotros.index') !!}">nosotros</a>
          </li>
          <li class="breadcrumb-item active">Editar</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
         @include('message_errors.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edit nosotros</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($nosotros, ['route' => ['nosotros.update', $nosotros->id], 'method' => 'patch']) !!}

                              @include('nosotros.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection