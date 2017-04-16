@extends('email.layout')

@section('email-content')
<tr>
    <td class="h2">
        Thank You for Registering
    </td>
</tr>
<tr>
    <td class="bodycopy">
        <p>Hi, {{ $username }}!</p>
        <p>
            Thank you for registering to Marketinc.
        </p>
        <p>
            To activate your premium account, please finish your payment to: <br>
            Bank Account Number: BNI 6000300200 a/n Marketinc <br>
            Amount that have to be paid: Rp{{ $total_payment }}
        </p>
        <p>
            After you finished your payment, please do the confirmation by clicking this link {{ URL::to('brand/confirmation') }} and put <strong>{{ $transaction_id }}</strong> as your transaction code.
        </p>
        <p>
            Best regards,
            <br> Marketinc Team    
        </p>
    </td>
</tr>
@endsection