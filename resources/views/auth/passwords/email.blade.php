@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/reset-password.css') }}" rel="stylesheet">
@endsection

<!-- Main Content -->
@section('content')
<nav class="navbar navbar-inverse fixed-top bg-inverse">
    <div class="container">
        <a href="#" class="navbar-brand"><img src="{{ elixir('img/favicon.png') }}" alt=""></a>Reset Password
    </div>
</nav>

<div class="container">
    {{-- @if ($errors->has('email'))
        <div class="alert alert-danger" role="alert">
            <strong>Oh snap!</strong> The email you entered did not match our records. Please double-check and try again.
        </div>
    @endif --}}

    <div class="mt-1">
        @if ($errors->has('email'))
        <h2 class="alert-danger">We couldn't find your account with that information</h2>
        @else
        <h2>Find your Marketinc account</h2>
        @endif
    </div>
    <p class="lead">
        @if ($errors->has('email'))
        Please try searching for your email address again.
        @else
        Enter your email address.
        @endif
    </p>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Send Password Reset Link
            </button>
        </div>
    </form>
</div>
@endsection
