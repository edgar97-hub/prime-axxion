<div class="table-responsive-sm">


<table class="table table-striped">
  <tr>
 
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
    
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
         
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
           
       
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
          
        </td>
    </tr>
    @endforeach
</table>

 
</div>