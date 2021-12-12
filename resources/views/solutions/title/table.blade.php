<div class="table-responsive-sm">
    <table class="table table-striped" id="qqqs-table">
        <thead>
            <tr>
                <th>Titulo</th>
      
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($solutions as $solution)
          @if(!is_null($solution->title))
          <tr>
                <td>{{ $solution->title }}</td>
                <td>
                    {!! Form::open(['route' => ['solutions.destroy', $solution->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('solutions.show', [$solution->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('solutions.edit', [$solution->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>

        
          @endif
            
        @endforeach
        </tbody>
    </table>
</div>