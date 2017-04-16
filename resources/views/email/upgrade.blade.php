@extends('email.layout')

@section('email-content')
<tr>
    <td class="h2">
        Your Account Has Been Upgraded
    </td>
</tr>
<tr>
    <td class="bodycopy">
        <p>Hi, {{ $username }}!</p>
        <p>
            We have confirmed your payment and upgraded your package to <strong>{{ $membership }}</strong>. Please continue enjoying your experience using Marketinc!    
        </p>
        <p>
            Best regards,
            <br> Marketinc Team    
        </p>
    </td>
</tr>
@endsection