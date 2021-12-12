<div class="table-responsive-sm">
    <table class="table table-striped" id="imgs-table">
        <thead>
            <tr>
                <th>Textitle</th>
        <th>Img</th>
        <th>Our Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($imgs as $img)
            <tr>
                <td>{{ $img->textitle }}</td>
            <td>{{ $img->img }}</td>
            <td>{{ $img->our_id }}</td>
                <td>
                    {!! Form::open(['route' => ['imgs.destroy', $img->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('imgs.show', [$img->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('imgs.edit', [$img->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>