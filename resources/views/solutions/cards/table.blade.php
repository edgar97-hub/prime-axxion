<div class="table-responsive-sm">
    <table class="table table-striped" id="qqqs-table">
        <thead>
            <tr>
                
        <th>Titulo Ligero</th>
        <th>Título en negrita</th>
        <th>Img</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($solutions as $solution)
            <tr>
               
            <td>{{ $solution->titulolight }}</td>
            <td>{{ $solution->titulonegrita }}</td>
            <td><img height="50" src="{{ asset('storage/'.$solution->img) }}" alt="" title=""></td>
            

                <td>
                    {!! Form::open(['route' => ['solutions.destroyCard', $solution->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('solutions.showCard',$solution->id) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('solutions.editCard',$solution->id) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>