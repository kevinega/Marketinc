@extends('layouts.app')

@section('content')
<div>
  <div>
    <div>
      <div>
        <h4>Payment Confirmation</h4>
      </div>
    </div>
  </div>

  <div>
      <div>
      	<div>
	        <div>
	          <div>
	              Please kindly check the email we sent after registration for your <b>transaction id</b>.
            </div>
	        </div>

            </br>
          
          {!! Form::open(['url' => 'url(/confirmation)']) !!}

        {!! Form::label('transaction_id', 'Transaction ID: ') !!}</br>
        {!! Form::text('transaction_id', null, ['id' => 'transaction_id', 'class' => 'form-control', 'placeholder' => 'ex: mcABC12']) !!}</br>

        {!! Form::label('confirmation', 'Bank: ') !!}</br>
        {!! Form::select('confirmation', [
          'MANDIRI' => 'MANDIRI',
          'BRI' => 'BRI',
          'BCA' => 'BCA',
          'BNI' => 'BNI',
          'BANK CIMB NIAGA' => 'BANK CIMB NIAGA',
          'BANK PERMATA' => 'BANK PERMATA',
          'Lainnya' => 'Lainnya'], null, ['placeholder' => 'Choose bank used for payment']) !!} </br>

        {!! Form::label('total_payment', 'Total Payment: ') !!}</br>
        {!! Form::text('total_payment', null, ['id' => 'total_payment', 'class' => 'form-control', 'placeholder' => 'ex Rp. 100000']) !!}</br>

        {!! Form::label('account_no', 'Account No.: ') !!}</br>
        {!! Form::text('account_no', null, ['id' => 'account_no', 'class' => 'form-control', 'placeholder' => 'ex 800 200 2001']) !!}</br>

        {!! Form::label('name', 'Name: ') !!}</br>
        {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'ex Rp. 100000']) !!}</br>
        </br>
        </br>

        {!! Form::button('Submit Confirmation', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

        {!! Form::close() !!}

        </div>
      </div>
    </div>
</div>
@endsection