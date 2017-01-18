<!-- content register page -->
<section="content">
<div class="container" style="margin-top:100px;">
    <h2 style="text-align:center">REGISTRATION FORM</h2>
    
    {!! Form::open(['id' => 'register-route-form']) !!}
          {!! Form::text('brand_name', null, ['id' => 'brand_name', 'class' => 'form-control', 'placeholder' => 'Restaurant Name', 'required']) !!}
          </br>
          {!! Form::text('username', null, ['id' => 'username', 'class' => 'form-control', 'placeholder' => 'Username', 'required']) !!}
          </br>
          {!! Form::text('address', null, ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Address', 'required']) !!}
          </br>
          {!! Form::text('location', null, ['id' => 'location', 'class' => 'form-control', 'placeholder' => 'Locations', 'required']) !!}
          </br>
          {!! Form::text('phone_one', null, ['id' => 'phone_one', 'class' => 'form-control', 'placeholder' => 'Phone Number 1', 'required']) !!}
          </br>
          {!! Form::text('phone_two', null, ['id' => 'phone_two', 'class' => 'form-control', 'placeholder' => 'Phone Number 2']) !!}
          </br>
          {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email', 'required']) !!}
          </br>
          {!! Form::text('password', null, ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'required']) !!}
          </br>
          {!! Form::text('confirm_password', null, ['id' => 'confirm_password', 'class' => 'form-control', 'placeholder' => 'Confirm Password', 'required']) !!}
          </br>
          {!! Form::button('Submit', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

      {!! Form::close() !!}

      <h2 style="text-align:center">CHOOSE YOUR PACKAGE</h2>
      <table class="table table-striped">
          <tbody>
              <tr>
                  <th style="text-align:center;">Promo List</th>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>Map</th>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>Photo Albums</th>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>Details</th>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>Review From Article</th>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>Own Article Column</th>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>About Us</th>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>Video Placement</th>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>Calculator</th>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>360</th>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>Music Playlist</th>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>Notif and Direct Email</th>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>Number of Followers</th>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>UBER</th>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>Branches</th>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
              <tr>
                  <th>Analytics</th>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons">remove</i></td>
                  <td><i class="material-icons" style="color:green;">check_circle</i></td>
              </tr>
          </tbody>
      </table>
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
</section>