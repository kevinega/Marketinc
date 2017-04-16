@extends('email.layout')

@section('email-content')
<tr>
    <td class="h2">
        Verify Your Email Address
    </td>
</tr>
<tr>
    <td class="bodycopy">
        <p>Hi, {{ $username }}!</p>
        <p>
            Thanks for joining Marketinc. Please verify your email address simply by clicking the button below.    
        </p>
    </td>
</tr>
<tr>
    <td>
        <table class="buttonwrapper" align="center" bgcolor="#ffcc46" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="button" height="45">
                    <a href="{{ URL::to('brand/register/verify/' . $confirmation_code) }}">Verify My Email</a>
                </td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td class="bodycopy">
        <p>
            If the above button does not automatically redirect you, simply copy and paste this URL in your browser: {{ URL::to('brand/register/verify/' . $confirmation_code) }}    
        </p>
        <p>
            Best regards,
            <br> Marketinc Team    
        </p>
    </td>
</tr>
@endsection