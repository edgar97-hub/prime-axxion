@extends('layouts.app')

@section('content')
      <ol class="breadcrumb">
      <li class="breadcrumb-item">Lista</li>
      <li class="breadcrumb-item">
        <a href="#">Take Axxion</a>
      </li>
      <li class="breadcrumb-item active">Nuevo</li>
    </ol>


     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Nuevo</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'takeAxxions.store', 'files' => true,'onsubmit'=>'sendObject()','id' => 'myform'] ) !!}

                                   @include('take_axxions.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
