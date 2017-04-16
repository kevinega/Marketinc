@extends('email.layout')

@section('email-content')
<tr>
    <td class="h2">
        Your Account Has Expired
    </td>
</tr>
<tr>
    <td class="bodycopy">
        <p>Hi, {{ $username }}!</p>
        <p>
            Your account has expired and your membership status has been reset to <strong>FREE</strong>. If you miss the old features, you can continue using it by upgrading your membership.
        </p>
        <p>
            Best regards,
            <br> Marketinc Team    
        </p>
    </td>
</tr>
@endsection