@extends('layouts.app')


@section('page-style')
<link href="{{ elixir('css/login.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="overlay">
    <div class="container">
        {!! Form::open(['id' => 'login-route-form']) !!}
            <img src="/img/logo-full.png" class="mx-auto d-block" alt="responsive_image">
            @if ($errors->has('username'))
                {!! $errors->first('username', '<span class="alert-danger">:message</span>') !!}
            @endif
            {!! Form::text('username', old('username'), ['id' => 'username', 'class' => 'form-control margin-bottom-10', 'placeholder' => 'Username', 'required']) !!}
            @if ($errors->has('password'))
                {!! $errors->first('password', '<span class="alert-danger">:message</span>') !!}
            @endif
            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'required']) !!}
            <a id="forgot-password" class="margin-bottom-10" href="{{ url('/password/reset') }}">Forgot Password?</a>    
            {!! Form::button('Log in', ['class' => 'btn btn-primary btn-block margin-bottom-10', 'type' => 'submit']) !!}
            <a id="register-question" href='{{ url('/register') }}'>Don't have any account? Join now!</a>
        {!! Form::close() !!}
    </div>
</div>
@endsection

@section('footer')
<footer class="footer">
    <div class="container">
        <img src="/img/logo-m.png" class="margin-bottom-10" alt="M">
        <div>© 2017 Marketinc</div>
    </div>
</footer>
@endsection