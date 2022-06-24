<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{{ $customerInquiries->name }}</p>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Apellido:') !!}
    <p>{{ $customerInquiries->last_name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $customerInquiries->email }}</p>
</div>

<!-- Telephone Field -->
<div class="form-group">
    {!! Form::label('telephone', 'Teléfono:') !!}
    <p>{{ $customerInquiries->telephone }}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', 'País:') !!}
    <p>{{ $customerInquiries->country }}</p>
</div>

<!-- Investor In Financial Assests Field -->
<div class="form-group">

    @php
      
      $investor_in_financial_assests = '';
      if($customerInquiries->investor_in_financial_assests == 1)
      {
        $investor_in_financial_assests = 'Si';
      }
      else{
        $investor_in_financial_assests = 'No';
      }
      
    @endphp

    {!! Form::label('investor_in_financial_assests', 'Inversor en Activos Financieros:') !!}
    
    <p>{{ $investor_in_financial_assests }}</p>
</div>

<!-- Comment Field -->
<div class="form-group">
    {!! Form::label('comment', 'Comentario:') !!}
    <p>{{ $customerInquiries->comment }}</p>
</div>

 