<!-- content register page -->
@extends('layouts.app')

@section('page-style')
<link href="{{ elixir('css/navbar.css') }}" rel="stylesheet">
<link href="{{ elixir('css/register.css') }}" rel="stylesheet">
@endsection

@section('navbar')
  @include('navbar')
@endsection

@section('content')
<div class="container">
    <div class="registration-form">
        <h2>REGISTRATION FORM</h2>
          
        {!! Form::open(['id' => 'register-route-form']) !!}
            @if ($errors->has('membership'))
                {!! $errors->first('membership', '<span class="alert-danger">:message</span>') !!}
            @endif
            <br>
            <!--div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>        
                @endforeach
            </div-->

            @if ($errors->has('brand_name'))
              {!! $errors->first('brand_name', '<span class="alert-danger">:message</span>') !!}
            @endif
            {!! Form::text('brand_name', null, ['id' => 'brand_name', 'class' => 'form-control', 'placeholder' => 'Restaurant Name'], 'autofocus') !!}
            </br>

            @if ($errors->has('username'))
                {!! $errors->first('username', '<span class="alert-danger">:message</span>') !!}
            @endif
            {!! Form::text('username', null, ['id' => 'username', 'class' => 'form-control', 'placeholder' => 'Username']) !!}
            </br>

            @if ($errors->has('address'))
                {!! $errors->first('address', '<span class="alert-danger">:message</span>') !!}
            @endif
            {!! Form::text('address', null, ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Address']) !!}
            </br>

            @if ($errors->has('phone_one'))
                {!! $errors->first('phone_one', '<span class="alert-danger">:message</span>') !!}
            @endif
            {!! Form::text('phone_one', null, ['id' => 'phone_one', 'class' => 'form-control', 'placeholder' => 'Phone Number 1']) !!}
            </br>

            @if ($errors->has('phone_two'))
                {!! $errors->first('phone_two', '<span class="alert-danger">:message</span>') !!}
            @endif
            {!! Form::text('phone_two', null, ['id' => 'phone_two', 'class' => 'form-control', 'placeholder' => 'Phone Number 2']) !!}
            </br>

            @if ($errors->has('email'))
                {!! $errors->first('email', '<span class="alert-danger">:message</span>') !!}
            @endif
            {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email']) !!}
            </br>

            @if ($errors->has('password'))
                {!! $errors->first('password', '<span class="alert-danger">:message</span>') !!}
            @endif
            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password']) !!}
            </br>
            {!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
            </br>

            <div class="membership-label">
                {!! Form::label('membership', 'Choose Your Package* ') !!}
                <button type="button" class="btn btn-link">
                    <i class="material-icons yellow" id="help" data-toggle="tooltip" data-placement="right" title="See Package Details">help</i>
                </button>
            </div>

            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-membership">
                    {!! Form::radio('membership', 'free', false, ['id' => 'membership1', 'class' => 'btn-membership']) !!} FREE
                </label>
                <label class="btn btn-membership"> 
                    {!! Form::radio('membership', 'basic', false, ['id' => 'membership2', 'class' => 'btn-membership']) !!} BASIC
                </label>
            </div>

            <div class="button">
                {!! Form::button('Register', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

                {!! Form::close() !!}
            </div>
    </div>


    <div class="package-form">
        <div class="package-form-header">
            <button type="button" class="btn btn-link">
                <i class="material-icons yellow" id="back">arrow_back</i>
            </button>
            <h2>PACKAGE DETAILS</h2>
            <div class="hidden"></div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th class="yellow">FREE</th>
                    <th class="yellow">BASIC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Promotion List</th>
                    <td><i class="material-icons green">check_circle</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><i class="material-icons green">check_circle</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
                <tr>
                    <th>Details</th>
                    <td><i class="material-icons green">check_circle</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
                <tr>
                    <th>Maps</th>
                    <td><i class="material-icons green">check_circle</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
                <tr>
                    <th>Photo Album</th>
                    <td><i class="material-icons green">check_circle</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
                <tr>
                    <th>Review From Article</th>
                    <td><i class="material-icons green">check_circle</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
                <tr>
                    <th>Menu</th>
                    <td><i class="material-icons">remove</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
                <tr>
                    <th>Calculator</th>
                    <td><i class="material-icons">remove</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
                <tr>
                    <th>Calendar</th>
                    <td><i class="material-icons">remove</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
                <tr>
                    <th>Best Offer</th>
                    <td><i class="material-icons">remove</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
                <tr>
                    <th>Video Placement</th>
                    <td><i class="material-icons">remove</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
                <tr>
                    <th>Music Playlist</th>
                    <td><i class="material-icons">remove</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
                <tr>
                    <th>360</th>
                    <td><i class="material-icons">remove</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
                <tr>
                    <th>Direct Email</th>
                    <td><i class="material-icons">remove</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
                <tr>
                    <th>Number of Followers</th>
                    <td><i class="material-icons">remove</i></td>
                    <td><i class="material-icons green">check_circle</i></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
@endsection

@section('page-js')
$(document).ready(function(){
    $('#help').tooltip();

    $("#help").click(function(){
        $(".registration-form").hide();
        $(".package-form").show();
    });

    $("#back").click(function(){
        $(".package-form").hide();
        $(".registration-form").show();
    });
});
@endsection