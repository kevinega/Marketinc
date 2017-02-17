@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/admin-login.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="overlay">
    <div class="container">
        {!! Form::open(['id' => 'login-route-form']) !!}
        <img src="/img/logo-full.png" class="mx-auto d-block" alt="responsive_image">
        @if ($errors->has('username') || $errors->has('password'))
        <div class="alert alert-danger" role="alert">
            <strong>Oh snap!</strong> The username and password you entered did not match our records. Please double-check and try again.
        </div>
        @endif
        {!! Form::text('username', old('username'), ['id' => 'username', 'class' => 'form-control margin-bottom-10', 'placeholder' => 'Username', 'required']) !!}
        {!! Form::password('password', ['id' => 'password', 'class' => 'form-control margin-bottom-10', 'placeholder' => 'Password', 'required']) !!}
        {!! Form::button('Log in', ['class' => 'btn btn-primary btn-block', 'type' => 'submit']) !!}
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