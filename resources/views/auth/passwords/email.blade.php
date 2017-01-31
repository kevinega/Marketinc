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
    <div class="mt-1">
        <h2>Find your Marketinc account</h2>
    </div>
    <p class="lead">
        Enter your email.
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

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Send Password Reset Link
            </button>
        </div>
    </form>
</div>
@endsection
