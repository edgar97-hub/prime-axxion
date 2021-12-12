<div class="table-responsive-sm">
    <table class="table table-striped" id="qqs-table">
        <thead>
            <tr>
              <th>Sección</th>
              <th>Campo de título </th>
              <th>Campo de texto 1</th>
              <th>Campo de texto 2</th>
             
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
       
        
        @foreach((array)  $our_information->data->our_details as $value )
            <tr> 
              <td>{{ $our_information->data->seccion }}</td>
              <td>{{ $value->title }}</td>
              <td>{{ $value->textcolumn1 }}</td>
              <td>{{ $value->textcolumn2 }}</td>
                <td>
                    {!! Form::open(['route' => ['nosotrosdetalles.destroy', $value->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('nosotrosdetalles.show', [$value->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('nosotrosdetalles.edit', [$value->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
