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
    <div class="registration">
        <div class="registration-form-hidden"></div>
        <div class="registration-form">
            <h2>REGISTRATION FORM</h2>
        </div>
        <div class="registration-form-error"></div>
    </div>

    <div class="registration">
        <div class="registration-form-hidden"></div>
        <div class="registration-form">
            {!! Form::open(['id' => 'register-route-form']) !!}

            <table>
                <tbody>
                    <tr>
                        <td>{!! Form::label('brand_name', 'Restaurant Name', ['class' => 'label']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::text('brand_name', null, ['id' => 'brand_name', 'class' => 'form-control', 'placeholder' => 'ex: Dapur Desa']) !!}</td>
                    </tr>

                    <tr>
                        <td>{!! Form::label('username', 'Username', ['class' => 'label']) !!}</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-group">
                                <span class="input-group-addon">marketinc.us/</span>
                                {!! Form::text('username', null, ['id' => 'username', 'class' => 'form-control', 'placeholder' => 'ex: dapurdesa']) !!}
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>{!! Form::label('address', 'Address', ['class' => 'label']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::text('address', null, ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'ex: Jl. Tebet Dalam No. 7']) !!}</td>
                    </tr>

                    <tr>
                        <td>{!! Form::label('phone_one', 'Phone Number 1', ['class' => 'label']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::text('phone_one', null, ['id' => 'phone_one', 'class' => 'form-control', 'placeholder' => 'ex: 089765783094']) !!}</td>
                    </tr>

                    <tr>
                        <td>{!! Form::label('phone_two', 'Phone Number 2', ['class' => 'label']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::text('phone_two', null, ['id' => 'phone_two', 'class' => 'form-control', 'placeholder' => 'ex: 089765783094']) !!}</td>
                    </tr>

                    <tr>
                        <td>{!! Form::label('email', 'Email', ['class' => 'label']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'ex: dapurdesa@gmail.com']) !!}</td>
                    </tr>

                    <tr>
                        <td>{!! Form::label('phone_two', 'Password', ['class' => 'label']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::password('password', ['id' => 'password', 'class' => 'form-control']) !!}</td>
                    </tr>

                    <tr>
                        <td>{!! Form::label('phone_two', 'Confirm Password', ['class' => 'label']) !!}</td>
                    </tr>
                    <tr>
                        <td>{!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control']) !!}</td>
                    </tr>

                    <tr>
                        <td>
                            <div class="membership-label">
                                {!! Form::label('membership', 'Choose Your Package* ') !!}
                                <button type="button" class="btn btn-link">
                                    <i class="material-icons yellow" id="help" data-toggle="tooltip" data-placement="right" title="See Package Details">help</i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-membership">
                                    {!! Form::radio('membership', 'free', false, ['id' => 'membership1', 'class' => 'btn-membership']) !!} FREE
                                </label>
                                <label class="btn btn-membership"> 
                                    {!! Form::radio('membership', 'basic', false, ['id' => 'membership2', 'class' => 'btn-membership']) !!} BASIC
                                </label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div class="button">
                {!! Form::button('Register', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

                {!! Form::close() !!}
            </div>
        </div>

        <div class="registration-form-error">
            @if ($errors->has('brand_name') || $errors->has('username') || $errors->has('address') || $errors->has('phone_one') || $errors->has('email') || $errors->has('password') || $errors->has('membership'))
                <table>
                    <tbody>
                        <tr class="height-37"></tr>
                        <tr>
                            <td>
                                @if ($errors->has('brand_name'))
                                    <div class="error-label">
                                        <i class="material-icons alert-danger">clear</i>
                                        {!! $errors->first('brand_name', '<span class="alert-danger">:message</span>') !!}
                                    </div>
                                @endif
                            </td>
                        </tr>
                    
                        <tr class="height-37"></tr>
                        <tr>
                            <td>
                                @if ($errors->has('username'))
                                    <div class="error-label">
                                        <i class="material-icons alert-danger">clear</i>
                                        {!! $errors->first('username', '<span class="alert-danger">:message</span>') !!}
                                    </div>
                                @endif
                            </td>
                        </tr>

                        <tr class="height-37"></tr>
                        <tr>
                            <td>
                                @if ($errors->has('address'))
                                    <div class="error-label">
                                        <i class="material-icons alert-danger">clear</i>
                                        {!! $errors->first('address', '<span class="alert-danger">:message</span>') !!}
                                    </div>
                                @endif
                            </td>
                        </tr>

                        <tr class="height-37"></tr>
                        <tr>
                            <td>
                                @if ($errors->has('phone_one'))
                                    <div class="error-label">
                                        <i class="material-icons alert-danger">clear</i>
                                        {!! $errors->first('phone_one', '<span class="alert-danger">:message</span>') !!}
                                    </div>
                                @endif
                            </td>
                        </tr>

                        <tr class="height-37"></tr>
                        <tr>
                            <td>
                                @if ($errors->has('phone_two'))
                                    <div class="error-label">
                                        <i class="material-icons alert-danger">clear</i>
                                        {!! $errors->first('phone_two', '<span class="alert-danger">:message</span>') !!}
                                    </div>
                                @endif
                            </td>
                        </tr>

                        <tr class="height-37"></tr>
                        <tr>
                            <td>
                                @if ($errors->has('email'))
                                    <div class="error-label">
                                        <i class="material-icons alert-danger">clear</i>
                                        {!! $errors->first('email', '<span class="alert-danger">:message</span>') !!}
                                    </div>
                                @endif
                            </td>
                        </tr>

                        <tr class="height-37"></tr>
                        <tr>
                            <td>
                                @if ($errors->has('password'))
                                    <div class="error-label">
                                        <i class="material-icons alert-danger">clear</i>
                                        {!! $errors->first('password', '<span class="alert-danger">:message</span>') !!}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        
                        <tr class="height-37"></tr>
                        <tr>
                            <td></td>
                        </tr>
                        
                        <tr class="height-37"></tr>
                        <tr>
                            <td>
                                @if ($errors->has('membership'))
                                    <div class="error-label">
                                        <i class="material-icons alert-danger">clear</i>
                                        {!! $errors->first('membership', '<span class="alert-danger">:message</span>') !!}
                                    </div>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            @endif
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
        $(".registration").hide();
        $(".package-form").show();
    });

    $("#back").click(function(){
        $(".package-form").hide();
        $(".registration").show();
    });
});
@endsection