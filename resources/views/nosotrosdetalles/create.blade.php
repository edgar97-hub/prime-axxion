@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
       <li class="breadcrumb-item">
        <a href="#">Sección azul</a>
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
                                <strong>Nosotros detalles</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'nosotrosdetalles.store', 'files' => true]) !!}

                                    
                                @include('nosotrosdetalles.sections.azul.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
