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
	              Please kindly check the email we sent after registration for your transaction id.
	          </div>
	        </div>

          
          <form action="{{url('/confirmation')}}" method="POST">
          {{ csrf_field() }}
          <div>
               <div>
                <input id="transaction_id" name="transaction_id" type="text" required>
                <label for="transaction_id">Transaction ID (ex: mcQs7Fd)</label>
              </div>
              <div>
                <select name="confirmation" required>
                  <option disabled selected>Bank</option>
                  <option value='MANDIRI'>MANDIRI</option>
                  <option value='BRI'>BRI</option>
                  <option value='BCA'>BCA</option>
                  <option value='BNI'>BNI</option>
                  <option value='BANK CIMB NIAGA'>BANK CIMB NIAGA</option>
                  <option value='BANK PERMATA'>BANK PERMATA</option>
                  <option value='Lainnya'>Lainnya</option>
                </select>
              </div>
              <div>
                <input id="total_payment" name="total_payment" type="text" required>
                <label for="total_payment">Total Payment (Rp. 100000)</label>
              </div>
			  <div>
                <input id="account_no" name="account_no" type="text" class="validate" required>
                <label for="account_no">Account Number</label>
              </div>
			  <div>
                <input id="name" name="name" type="text" class="validate" required>
                <label for="name">Name</label>
              </div>
				{{--<div class="input-field col m12">
              	{!! Recaptcha::render() !!}
              </div> --}}
              <div>
                <button type="submit" name="action">
                  Send Confirmation
                </button>
               </div>
          </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection