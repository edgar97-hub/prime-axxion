<div class="table-responsive-sm">
    <table class="table table-striped" id="qs-table">
        <thead>
            <tr>
                <th>Sección</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($nosotros as $data)
            <tr>
                <td>{{ $data->seccion }}</td>
                <td>
                    {!! Form::open(['route' => ['nosotros.destroy', $data->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('nosotros.show', [$data->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('nosotros.edit', [$data->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>