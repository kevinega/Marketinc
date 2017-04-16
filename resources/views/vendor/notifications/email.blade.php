@extends('email.layout')

@section('email-content')
<tr>
    <td class="h2">
        Verify Your Email Address
    </td>
</tr>
<tr>
    <td class="bodycopy">
        <p>Hello, there!</p>
        <p>
            You are receiving this email because we received a password reset request for your account. You can simply reset your password by clicking the button below.    
        </p>
    </td>
</tr>
<tr>
    <td>
        <table class="buttonwrapper" align="center" bgcolor="#ffcc46" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="button" height="45">
                    <a href="{{ $actionUrl }}">{{ $actionText }}</a>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td class="bodycopy">
        <p>
            If you’re having trouble clicking the "{{ $actionText }}" button, copy and paste the URL below into your web browser: {{ $actionUrl }}
        </p>
    </td>
</tr>
<tr>
    <td class="bodycopy">
        <p>
            If you did not request a password reset, no further action is required.
        </p>
        <p>
            Best regards,
            <br> Marketinc Team    
        </p>
    </td>
</tr>
@endsection