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
           @if ($errors->has('brand_name'))
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>        
                @endforeach
            </div>
            @endif
            {!! Form::text('brand_name', null, ['id' => 'brand_name', 'class' => 'form-control', 'placeholder' => 'Restaurant Name']) !!}
            {!! Form::label('membership', 'ex: Dapur Desa', ['class' => 'ex']) !!}
            </br>
            <div class="input-group">
                <span class="input-group-addon">marketinc.us/</span>
                {!! Form::text('username', null, ['id' => 'username', 'class' => 'form-control', 'placeholder' => 'username']) !!}
            </div>
            {!! Form::label('membership', 'ex: dapurdesa', ['class' => 'ex']) !!}
            </br>
            {!! Form::text('address', null, ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Address']) !!}
            {!! Form::label('membership', 'ex: Jl. Tebet Dalam No. 7', ['class' => 'ex']) !!}
            </br>
            {!! Form::text('phone_one', null, ['id' => 'phone_one', 'class' => 'form-control', 'placeholder' => 'Phone Number 1']) !!}
            {!! Form::label('membership', 'ex: 089765783094', ['class' => 'ex']) !!}
            </br>
            {!! Form::text('phone_two', null, ['id' => 'phone_two', 'class' => 'form-control', 'placeholder' => 'Phone Number 2']) !!}
            {!! Form::label('membership', 'ex: 089765783094', ['class' => 'ex']) !!}
            </br>
            {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email']) !!}
            {!! Form::label('membership', 'ex: dapurdesa@gmail.com', ['class' => 'ex']) !!}
            </br>
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