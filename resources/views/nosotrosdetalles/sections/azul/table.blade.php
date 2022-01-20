<div class="table-responsive-sm">
    <table class="table table-striped" id="qqs-table">
        <thead>
            <tr>
              
              <th>título ligero </th>
              <th>breve texto 1</th>
              <th>breve texto 2</th>
             
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
       
        
        @foreach((array)  $our_information->data->our_details as $value )
             @php
              $numberRecords += 1 ;
            @endphp
            <tr> 
              
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
        @if ($numberRecords >0)
           <script>
            var x = document.getElementById("addRecords");
            x.style.display = "none";
           </script>
        @endif
        </tbody>
    </table>
</div>
