<div class="table-responsive-sm">
    <table class="table table-striped" id="customerInquiries-table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
         
       
        
       
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customerInquiries as $customerInquiries)
            <tr>
                <td>{{ $customerInquiries->name }}</td>
            <td>{{ $customerInquiries->last_name }}</td>
            <td>{{ $customerInquiries->email }}</td>
            
            
           
            
                <td>
                    {!! Form::open(['route' => ['customerInquiries.destroy', $customerInquiries->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('customerInquiries.show', [$customerInquiries->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                         
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Estas seguro?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>