<div class="table-responsive-sm">
    <table class="table table-striped" id="takeAxxions-table">
        <thead>
            <tr>
                <th>Título </th>
        <th>Descripción</th>
        <th>Img </th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($takeAxxions as $takeAxxion)
            <tr>
               
            <td>{{ $takeAxxion->title }}</td>
            <td>{{ $takeAxxion->description }}</td>
            <td><img height="50" src="{{ asset('storage/'.$takeAxxion->img) }}" alt="" title=""></td></td>
                <td>
                    {!! Form::open(['route' => ['takeAxxions.destroy', $takeAxxion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('takeAxxions.show', [$takeAxxion->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('takeAxxions.edit', [$takeAxxion->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>