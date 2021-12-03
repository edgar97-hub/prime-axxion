<div class="table-responsive-sm">
    <table class="table table-striped" id="ayudas-table">
        <thead>
            <tr>
                <th>Pregunta</th>
        <th>Respuesta</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ayudas as $ayuda)
            <tr>
                <td>{{ $ayuda->pregunta }}</td>
            <td>{{ $ayuda->respuesta }}</td>
                <td>
                    {!! Form::open(['route' => ['ayudas.destroy', $ayuda->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('ayudas.show', [$ayuda->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('ayudas.edit', [$ayuda->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>