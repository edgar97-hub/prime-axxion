<div class="table-responsive-sm">
    <table class="table table-striped" id="qqs-table">
        <thead>
            <tr>
              <th>Sección</th>
              <th>Campo de título ligero </th>
              <th>campo de texto 1</th>
              <th>campo de texto 2</th>
              <th>Campo de título negrita</th>
              <th>Img</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach( (array) $response->data as $value )
            @foreach( (array)$value->content as $w )
            <tr>
              <td>{{ $value->seccion }}</td>
              <td>{{ $w->title }}</td>
              <td>{{ $w->textcolumn1 }}</td>
              <td>{{ $w->textcolumn2 }}</td>
              <td>{{ $w->textitle }}</td>
              <td>
              <img height="50" src="{{ asset('storage/'.$w->img) }}" alt="" title="">
              </td>
             
                <td>
                    {!! Form::open(['route' => ['nosotrosdetalles.destroy', $w->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('nosotrosdetalles.show', [$w->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('nosotrosdetalles.edit', [$w->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>
</div>
