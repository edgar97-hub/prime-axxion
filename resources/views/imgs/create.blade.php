@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
   
      </li>
 
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-plus-square-o fa-lg"></i>
                                <strong>Create</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'imgs.store', 'files' => true]) !!}

                                 
                                  @if($img_id == 2)
                                    @include('imgs.sections.fotografíaInstitucional.fields')
                                  @endif

                                  @if($img_id == 3)
                                    @include('imgs.sections.somospartede.fields')
                                  @endif

                                  @if($img_id == 4)
                                    @include('imgs.sections.bancos.fields')
                                  @endif

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
