<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>
            <p>Hi {{ $username }},</p>
            </br>
            <p>Thanks for joining Marketinc. </p>
            <p>Please verify your email address by clicking the link below</p>
            <p>{{ URL::to('brand/register/verify/' . $confirmation_code) }}</p><br/>

        </div>

    </body>
</html>