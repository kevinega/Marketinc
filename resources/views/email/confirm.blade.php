@extends('email.layout')

@section('email-content')
<tr>
    <td class="h2">
        Thank You for Confirming Your Payment
    </td>
</tr>
<tr>
    <td class="bodycopy">
        <p>Hi, {{ $username }}!</p>
        <p>
            We have received your payment confirmation. We will soon send an email for you to activate your account. Please kindly wait at least 2 x 24 working hours. Thank you for your patience.    
        </p>
        <p>
            Best regards,
            <br> Marketinc Team    
        </p>
    </td>
</tr>
@endsection