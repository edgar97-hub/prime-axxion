@extends('layouts.app')

@section('content')
  

        <ol class="breadcrumb">
      <li class="breadcrumb-item">Lista</li>
      <li class="breadcrumb-item">
        <a href="#">categorías</a>
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
                              <strong>Editar</strong>
                              <input type="checkbox" name="answer" id="Editar_category" style = "display:none"/>

                          </div>
                          <div class="card-body">
                              {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch','files' => true]) !!}

                              @include('categories.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection

 