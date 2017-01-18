@extends('layouts.app')

@section('content')
<div class="container">
    
    {!! Form::open(['id' => 'register-route-form']) !!}

          {!! Form::label('brand_name', 'Restaurant Name') !!}
          {!! Form::text('brand_name', null, ['id' => 'brand_name', 'class' => 'form-control', 'placeholder' => 'Restaurant Name', 'required']) !!}
          </br>

          {!! Form::label('username', 'Username') !!}
          {!! Form::textarea('username', null, ['id' => 'username', 'class' => 'form-control', 'placeholder' => 'Username', 'required']) !!}
          
          </br>

          {!! Form::label('address', 'Address') !!}
          {!! Form::text('address', null, ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Address', 'required']) !!}

          {!! Form::label('location', 'Locations') !!}
          {!! Form::text('location', null, ['id' => 'location', 'class' => 'form-control', 'placeholder' => 'Locations', 'required']) !!}

          </br>

          {!! Form::label('phone_one', 'Phone Number') !!}
          {!! Form::text('phone_one', null, ['id' => 'phone_one', 'class' => 'form-control', 'placeholder' => 'Phone Number', 'required']) !!}

          {!! Form::label('phone_two', 'Phone Number 2') !!}
          {!! Form::text('phone_two', null, ['id' => 'phone_two', 'class' => 'form-control', 'placeholder' => 'Phone Number', 'required']) !!}

          {!! Form::label('membership', 'membership') !!}
          {!! Form::text('membership', null, ['id' => 'membership', 'class' => 'form-control', 'placeholder' => 'membership', 'required']) !!}

                    {!! Form::label('description', 'Description') !!}
          {!! Form::text('description', null, ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'Description', 'required']) !!}

                    {!! Form::label('logo', 'Logo') !!}
          {!! Form::text('logo', null, ['id' => 'logo', 'class' => 'form-control', 'placeholder' => 'Logo', 'required']) !!}

                    {!! Form::label('cover', 'Cover') !!}
          {!! Form::text('cover', null, ['id' => 'cover', 'class' => 'form-control', 'placeholder' => 'Cover', 'required']) !!}

                    {!! Form::label('open_hour', 'Open Hour') !!}
          {!! Form::text('open_hour', null, ['id' => 'open_hour', 'class' => 'form-control', 'placeholder' => 'Open Hour', 'required']) !!}

                    {!! Form::label('email', 'Email') !!}
          {!! Form::text('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email', 'required']) !!}

                    {!! Form::label('password', 'Password') !!}
          {!! Form::text('password', null, ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'required']) !!}

          {!! Form::button('Submit', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

      {!! Form::close() !!}

    <!--div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div-->
</div>
@endsection
