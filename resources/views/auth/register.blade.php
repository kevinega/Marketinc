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
    <div class="registration-flex">
        <div class="registration-form">
            <h2>REGISTRATION FORM</h2>
        </div>
    </div>

    {!! Form::open(['id' => 'register-route-form']) !!}

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::label('brand_name', 'Restaurant Name', ['class' => 'label']) !!}
        </div>
        <div class="registration-flex-row"></div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::text('brand_name', null, ['id' => 'brand_name', 'class' => 'form-control', 'placeholder' => 'ex: Dapur Desa']) !!}
        </div>
        <div class="registration-flex-row">
            @if ($errors->has('brand_name'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('brand_name', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex-error">
        <div class="registration-flex-error-row">
            @if ($errors->has('brand_name'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('brand_name', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::label('username', 'Username', ['class' => 'label']) !!}
        </div>
        <div class="registration-flex-row"></div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::text('username', null, ['id' => 'username', 'class' => 'form-control', 'placeholder' => 'ex: dapur.desa']) !!}
        </div>
        <div class="registration-flex-row">
            @if ($errors->has('username'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('username', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex-error">
        <div class="registration-flex-error-row">
            @if ($errors->has('username'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('username', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::label('address', 'Address', ['class' => 'label']) !!}
        </div>
        <div class="registration-flex-row"></div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::text('address', null, ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'ex: Jl. Tebet Dalam No. 7']) !!}
        </div>
        <div class="registration-flex-row">
            @if ($errors->has('address'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('address', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex-error">
        <div class="registration-flex-error-row">
            @if ($errors->has('address'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('address', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::label('phone_one', 'Phone Number 1', ['class' => 'label']) !!}
        </div>
        <div class="registration-flex-row"></div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::text('phone_one', null, ['id' => 'phone_one', 'class' => 'form-control', 'placeholder' => 'ex: 089765783094']) !!}
        </div>
        <div class="registration-flex-row">
            @if ($errors->has('phone_one'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('phone_one', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex-error">
        <div class="registration-flex-error-row">
            @if ($errors->has('phone_one'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('phone_one', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::label('phone_two', 'Phone Number 2', ['class' => 'label']) !!}
        </div>
        <div class="registration-flex-row"></div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::text('phone_two', null, ['id' => 'phone_two', 'class' => 'form-control', 'placeholder' => 'ex: 089765783094']) !!}
        </div>
        <div class="registration-flex-row">
            @if ($errors->has('phone_two'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('phone_two', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex-error">
        <div class="registration-flex-error-row">
            @if ($errors->has('phone_two'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('phone_two', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::label('email', 'Email', ['class' => 'label']) !!}
        </div>
        <div class="registration-flex-row"></div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'ex: dapurdesa@gmail.com']) !!}
        </div>
        <div class="registration-flex-row">
            @if ($errors->has('email'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('email', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex-error">
        <div class="registration-flex-error-row">
            @if ($errors->has('email'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('email', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::label('phone_two', 'Password', ['class' => 'label']) !!}
        </div>
        <div class="registration-flex-row"></div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control']) !!}
        </div>
        <div class="registration-flex-row">
            @if ($errors->has('password'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('password', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex-error">
        <div class="registration-flex-error-row">
            @if ($errors->has('password'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('password', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'label']) !!}
        </div>
        <div class="registration-flex-row"></div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            {!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control']) !!}
        </div>
        <div class="registration-flex-row">
            @if ($errors->has('password.confirmed'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('password.confirmed', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex-error">
        <div class="registration-flex-error-row">
            @if ($errors->has('password.confirmed'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('password.confirmed', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            <div class="membership-label">
                {!! Form::label('membership', 'Choose Your Package* ') !!}
                <button type="button" class="btn btn-link">
                    <i class="material-icons yellow" id="help" data-toggle="tooltip" data-placement="top" title="See Package Details">help</i>
                </button>
            </div>
        </div>
        <div class="registration-flex-row">
            @if ($errors->has('membership'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('membership', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>

    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
             <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-membership">
                    {!! Form::radio('membership', 'free', false, ['id' => 'membership1', 'class' => 'btn-membership']) !!} FREE
                </label>
                <label class="btn btn-membership"> 
                    {!! Form::radio('membership', 'basic', false, ['id' => 'membership2', 'class' => 'btn-membership']) !!} BASIC
                </label>
            </div>
        </div>
        <div class="registration-flex-row"></div>
    </div>

    <div class="registration-flex-error">
        <div class="registration-flex-error-row">
            @if ($errors->has('membership'))
                <div class="error-label">
                    <i class="material-icons alert-danger">clear</i>
                    {!! $errors->first('membership', '<span class="alert-danger">:message</span>') !!}
                </div>
            @endif
        </div>
    </div>
    <div class="registration-flex">
        <div class="registration-flex-row"></div>
        <div class="registration-form">
            <div class="button">
                {!! Form::button('Register', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

                {!! Form::close() !!}
            </div>
        </div>
        <div class="registration-flex-row"></div>
    </div>
</div>



<div class="container">
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
        $(".registration-flex").hide();
        $(".package-form").show();
    });

    $("#back").click(function(){
        $(".package-form").hide();
        $(".registration-flex").show();
    });
});
@endsection