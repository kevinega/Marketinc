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
            </br>
            {!! Form::text('username', null, ['id' => 'username', 'class' => 'form-control', 'placeholder' => 'Username']) !!}
            </br>
            {!! Form::text('address', null, ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Address']) !!}
            </br>
            {!! Form::text('phone_one', null, ['id' => 'phone_one', 'class' => 'form-control', 'placeholder' => 'Phone Number 1']) !!}
            </br>
            {!! Form::text('phone_two', null, ['id' => 'phone_two', 'class' => 'form-control', 'placeholder' => 'Phone Number 2']) !!}
            </br>
            {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email']) !!}
            </br>
            {!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password']) !!}
            </br>
            {!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
            </br>

            <div class="button">
                <button type="button" class="btn btn-primary" id="show">NEXT</button>
            </div>
    </div>


    <div class="package-form">
        <h2>CHOOSE YOUR PACKAGE</h2>
        <table class="table table-striped">
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
                <tr>
                    <th></th>
                    <td>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-link">
                                {!! Form::radio('membership', 'free', false, ['id' => 'membership1', 'class' => 'btn-membership']) !!} Free
                            </label>
                        </div>
                    </td>
                    <td>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-link"> 
                                {!! Form::radio('membership', 'basic', false, ['id' => 'membership2', 'class' => 'btn-membership']) !!} Basic
                            </label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="button">
            {!! Form::button('REGISTER', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('page-js')
$(document).ready(function(){
    $("#show").click(function(){
        $(".registration-form").hide();
        $(".package-form").show();
    });
});
@endsection