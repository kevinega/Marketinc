<!-- content register page -->
@extends('layouts.app')
@section('navbar')
  @include('navbar')
@endsection
@section('content')
<div class="container" style="margin-top:100px;">
    <h2 style="text-align:center">REGISTRATION FORM</h2>
      
    {!! Form::open(['id' => 'register-route-form']) !!}
       @if ($errors->has('brand_name'))
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>        
            @endforeach
        </div>
        @endif
          {!! Form::text('brand_name', null, ['id' => 'brand_name', 'class' => 'form-control', 'placeholder' => 'Restaurant Name', 'required']) !!}
          </br>
          {!! Form::text('username', null, ['id' => 'username', 'class' => 'form-control', 'placeholder' => 'Username', 'required']) !!}
          </br>
          {!! Form::text('address', null, ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Address', 'required']) !!}
          </br>
          {!! Form::text('phone_one', null, ['id' => 'phone_one', 'class' => 'form-control', 'placeholder' => 'Phone Number 1', 'required']) !!}
          </br>
          {!! Form::text('phone_two', null, ['id' => 'phone_two', 'class' => 'form-control', 'placeholder' => 'Phone Number 2']) !!}
          </br>
          {!! Form::email('email', null, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'Email', 'required']) !!}
          </br>
          {!! Form::password('password', null, ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Password', 'required']) !!}
          </br>
          {!! Form::password('password_confirmation', null, ['id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Confirm Password', 'required']) !!}
          </br>
          <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary">
              {!! Form::radio('membership', 'free', ['id' => 'membership1', 'class' => '']) !!} Free
            </label>
            <label class="btn btn-primary">
              {!! Form::radio('membership', 'premium', ['id' => 'membership2', 'class' => '']) !!} Premium
            </label>
            <label class="btn btn-primary">
              {!! Form::radio('membership', 'vip', ['id' => 'membership3', 'class' => '']) !!} VIP
            </label>
          </div> 

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
      {!! Form::button('Submit', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}

      {!! Form::close() !!}

</div>
@endsection