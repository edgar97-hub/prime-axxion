@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('calltoActions.index') !!}">llamada a la acción</a>
      </li>
      <li class="breadcrumb-item active">Crear</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Crear llamada a la acción</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'calltoActions.store', 'files' => true]) !!}

                                   @include('callto_actions.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
