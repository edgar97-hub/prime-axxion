<div class="table-responsive-sm">
    <table class="table table-striped" id="qqs-table">
        <thead>
            <tr>
              <th>Sección</th>
               
              <th>Img</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach((array)  $our_information->data->our_img as $value )
            <tr> 
              <td>{{ $our_information->data->seccion }}</td>

              <td>
              <img height="50" src="{{ asset('storage/'.$value->img) }}" alt="" title="">
              </td>

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
