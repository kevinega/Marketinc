<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Thank You for Registering</h2>

        <div>
            Hi {{ $username }},
            </br>
            <p>Thank you for registering to Marketinc.</p>
            <p>To Activate your premium account, Please do payment to:</p>
            <p>Bank Account No. : BNI 6000300200 a/n Marketinc</p>
            <p>Amount you have to pay: Rp. {{ $total_payment }}</p>
            </br>
            <p>Then please do payment confirmation here: {{ URL::to('confirmation') }}</p>
            <p>Put <b>{{ $transaction_id }} </b> as your transaction code</p>
            <br/>

        </div>

    </body>
</html>