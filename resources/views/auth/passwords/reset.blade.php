@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/reset-password.css') }}" rel="stylesheet">
@endsection

@section('navbar')
@include('navbar')
@endsection

@section('content')
<div class="container">
    <div class="mt-1">
        @if ($errors->has('email') || $errors->has('password') || $errors->has('password_confirmation'))
        <h2 class="alert-danger">Oops, something's not right.</h2>
        @else
        <h2>Reset your password</h2>
        @endif
    </div>
    <p class="lead">
        @if ($errors->has('email'))
        The email entered did not found in our records.
        @elseif ($errors->has('password'))
        {{ $errors->first('password') }}
        @elseif ($errors->has('password_confirmation'))
        {{ $errors->first('password_confirmation') }}
        @else
        Please enter the email corresponding with your account and new password.
        @endif
    </p>
    <form role="form" method="POST" action="{{ url('brand/password/reset') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <label for="email" class="control-label">E-Mail Address</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <input id="password" type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="control-label">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Reset Password
            </button>
        </div>
    </form>
</div>
@endsection