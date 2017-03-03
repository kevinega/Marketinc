@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/confirmation.css') }}" rel="stylesheet">
@endsection

@section('navbar')
@include('navbar')
@endsection

@section('content')
<div class="container">
  @if (session('message') != '')
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>Holy guacamole!</strong> {{ session('message') }} You should check in on some of those fields below.
  </div>
  @endif
  <div class="mt-1">
    <h2>Confirm your payment</h2>
  </div>
  <p class="lead">
    Please kindly check the email we sent after registration for your Transaction ID.
  </p>
  {!! Form::open(['url' => 'brand/confirmation']) !!}
  
  <div class="form-group">
    {!! Form::label('transaction_id', 'Transaction ID') !!}
    {!! Form::text('transaction_id', null, ['id' => 'transaction_id', 'class' => 'form-control', 'placeholder' => 'ex: mcABC12', 'required']) !!}  
  </div>
  <div class="form-group">
    {!! Form::label('confirmation', 'Bank') !!}
    {!! Form::select('confirmation', ['MANDIRI' => 'MANDIRI','BRI' => 'BRI','BCA' => 'BCA','BNI' => 'BNI','BANK CIMB NIAGA' => 'BANK CIMB NIAGA','BANK PERMATA' => 'BANK PERMATA','Lainnya' => 'Lainnya'], null, ['class' => 'form-control', 'placeholder' => 'Choose bank used for payment', 'required'])
    !!}
  </div>
  <div class="form-group">
    {!! Form::label('total_payment', 'Total Payment') !!}
    {!! Form::text('total_payment', null, ['id' => 'total_payment', 'class' => 'form-control', 'placeholder' => 'ex: 100000', 'required']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('account_no', 'Account Number') !!}
    {!! Form::text('account_no', null, ['id' => 'account_no', 'class' => 'form-control', 'placeholder' => 'ex: 8002002001', 'required']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'ex: John Doe', 'required']) !!}
  </div>
  {!! Form::button('Submit', ['class' => 'btn btn-primary pull-right', 'type' => 'submit']) !!}

  {!! Form::close() !!}
</div>
@endsection

@section('footer')
<footer class="footer">
  <div class="container"><span class="text-muted">© 2017 Marketinc</span></div>
</footer>
@endsection

@section('page-script')
<script>
  $(".alert-danger").fadeTo(6000, 500).fadeOut(500, function(){
    $(".alert-danger").fadeOut(500);
  });
</script>
@endsection