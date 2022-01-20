<div class="table-responsive-sm">
    <table class="table table-striped" id="imgs-table">
        <thead>
            <tr>
                <th>título</th>
        <th>Img</th>
       
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach($imgs as $img)
            @php
              $numberRecords += 1 ;
            @endphp
            <tr>
                <td>{{ $img->textitle }}</td>
            <td> <img height="50" src="{{ asset('storage/'.$img->img) }}" alt="" title=""></td>
           
                <td>
                    {!! Form::open(['route' => ['imgs.destroy', $img->img_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('imgs.show', [$img->img_id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('imgs.edit', [$img->img_id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
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

