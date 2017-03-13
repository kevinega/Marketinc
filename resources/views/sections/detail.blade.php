<div class="feature-header">
	<h4>DETAILS</h4>
	<button><i class="material-icons btn-edit">mode_edit</i></button>
</div>

<div class="feature-details">
	<div class="feature-details-about">
	    <div class="maps">
	    	<iframe width="100%" height="400px" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJweaD5rvzaS4RkWhE7KiP38Y&key=AIzaSyDcfHgRTp-c6n4lachCjzNi73DDY5GFdag" allowfullscreen></iframe>
	    </div>
	    @php 
	    	$desc = Auth::guard()->user()->description;
	    	$add = Auth::guard()->user()->address;
	    	$phone1 = Auth::guard()->user()->phone_one;
	    	$phone2 = Auth::guard()->user()->phone_two;
	    	$openh = Auth::guard()->user()->open_hour;
	    @endphp

	    <!-- {{ var_dump($brands) }} -->
	</div>

	<div class="feature-details-facilities">
		<div class="facilities-flex">
			<div class="facility">
				<img src="{{ asset("img/facilities/breakfast.png") }}"> 
				<p class="detail-icon">Breakfast</p>
			</div>
			<div class="facility">
				<img src="{{ asset("img/facilities/smoking-area.png") }}"> 
				<p class="detail-icon">Smoking Area</p>
			</div>
			<div class="facility">
				<img src="{{ asset("img/facilities/reservation.png") }}">
				<p class="detail-icon">Reservation</p>
			</div>
			<div class="facility">
				<img src="{{ asset("img/facilities/valet.png") }}">
				<p class="detail-icon">Valet</p>
			</div>
		</div>
		<div class="facilities-flex">
			<div class="facility">
				<img src="{{ asset("img/facilities/parking-lot.png") }}"> 
				<p class="detail-icon">Parking Lot</p>
			</div>
			<div class="facility">
				<img src="{{ asset("img/facilities/ac.png") }}"> 
				<p class="detail-icon">Air Conditioner</p>
			</div>
			<div class="facility">
				<img src="{{ asset("img/facilities/private-room.png") }}"> 
				<p class="detail-icon">Private Room</p>
			</div>
			<div class="facility">
				<img src="{{ asset("img/facilities/delivery.png") }}"> 
				<p class="detail-icon">Delivery</p>
			</div>
		</div>
		<div class="facilities-flex">
			<div class="facility">
				<img src="{{ asset("img/facilities/wifi.png") }}"> 
				<p class="detail-icon">WiFi</p>
			</div>
			<div class="facility">
				<img src="{{ asset("img/facilities/working-space.png") }}"> 
				<p class="detail-icon">Working Space</p>
			</div>
			<div class="facility">
				<img src="{{ asset("img/facilities/alcohol.png") }}"> 
				<p class="detail-icon">Alcohol</p>
			</div>
			<div class="facility">
				<img src="{{ asset("img/facilities/changing-room.png") }}"> 
				<p class="detail-icon">Changing Room</p>
			</div>
		</div>
	</div>
</div>

<div class="edit-details">
	{!! Form::model($brands, ['url' => 'brand/details/update', 'method' => 'POST']) !!}
    {!! csrf_field() !!}

	{!! Form::label('description', 'Description:') !!}
	{{ Form::textarea('description', null, ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'About your restaurant']) }}</br>

	{!! Form::label('address', 'Address:') !!}
	{!! Form::text('address', null, ['id' => 'address', 'class' => 'form-control', 'placeholder' => 'Address of your restaurant'])!!}</br>
	
	{!! Form::label('phone_one', 'Phone 1:') !!}
	{!! Form::text('phone_one', null, ['id' => 'phone_one', 'class' => 'form-control', 'placeholder' => 'First phone number of your restaurant']) !!}</br>
	
	{!! Form::label('phone_two', 'Phone 2:') !!}
	{!! Form::text('phone_two', null, ['id' => 'phone_two', 'class' => 'form-control', 'placeholder' => 'Second phone number of your restaurant']) !!}</br>
	
	{!! Form::label('open_hour', 'Open Hour:') !!}
    {!! Form::text('open_hour', null, ['id' => 'open_hour', 'class' => 'form-control', 'placeholder' => 'Ex: 09:00AM - 22:00PM']) !!}</br>

    {!! Form::label('facilities', 'Facilities:') !!}
    
    <div class="feature-details-facilities">
		<div class="facilities-flex">
			<button type="button" class="btn btn-primary btn-facilities" data-toggle="button" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/breakfast.png") }}"> 
				<p class="detail-icon">Breakfast</p>
			</button>
			<button type="button" class="btn btn-primary btn-facilities" data-toggle="button" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/smoking-area.png") }}"> 
				<p class="detail-icon">Smoking Area</p>
			</button>
			<button type="button" class="btn btn-primary btn-facilities" data-toggle="button" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/reservation.png") }}">
				<p class="detail-icon">Reservation</p>
			</button>
			<button type="button" class="btn btn-primary btn-facilities" data-toggle="button" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/valet.png") }}">
				<p class="detail-icon">Valet</p>
			</button>
		</div>
		<div class="facilities-flex">
			<button type="button" class="btn btn-primary btn-facilities" data-toggle="button" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/parking-lot.png") }}"> 
				<p class="detail-icon">Parking Lot</p>
			</button>
			<button type="button" class="btn btn-primary btn-facilities" data-toggle="button" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/ac.png") }}"> 
				<p class="detail-icon">Air Conditioner</p>
			</button>
			<button type="button" class="btn btn-primary btn-facilities" data-toggle="button" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/private-room.png") }}"> 
				<p class="detail-icon">Private Room</p>
			</button>
			<button type="button" class="btn btn-primary btn-facilities" data-toggle="button" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/delivery.png") }}"> 
				<p class="detail-icon">Delivery</p>
			</button>
		</div>
		<div class="facilities-flex">
			<button type="button" class="btn btn-primary btn-facilities" data-toggle="button" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/wifi.png") }}"> 
				<p class="detail-icon">WiFi</p>
			</button>
			<button type="button" class="btn btn-primary btn-facilities" data-toggle="button" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/working-space.png") }}"> 
				<p class="detail-icon">Working Space</p>
			</button>
			<button type="button" class="btn btn-primary btn-facilities" data-toggle="button" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/alcohol.png") }}"> 
				<p class="detail-icon">Alcohol</p>
			</button>
			<button type="button" class="btn btn-primary btn-facilities" data-toggle="button" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/changing-room.png") }}"> 
				<p class="detail-icon">Changing Room</p>
			</button>
		</div>
	</div>
	</br>
    {!! Form::button('Update Details', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
    {{ Form::close() }}
</div>