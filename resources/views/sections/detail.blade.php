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
	    <div class="about-us" style="border:1px solid grey;">
        	<div class="description">
        		<p> {{ $desc }} </p>
        	</div>
	        <div class="location">
	        	<p>
	        		{{ $add }} </br>
	        		{{ $phone1 }} </br>
	        		<strong>Open Hours:</strong> {{ $openh }}
	        	</p>
	        </div>
	    </div>

	    <!-- {{ var_dump($brands) }} -->
	</div>

	<div class="feature-details-facilities">
			@php 
			$facilities = array("", "Breakfast", "Smoking Area", "Reservation", "Valet", "Parking Lot", "Air Conditioner", "Private Room", "Delivery", "WiFi", "Working Space", "Alcohol", "Changing Room");

			for($x = 1; $x <= 12; $x++) {
			@endphp
				@if($x % 4 == 1)
					<div class="facilities-flex">
				@endif
				<div class="facility">
					<img src="{{ asset("img/facilities/breakfast.png") }}"> 
					<p class="detail-icon">@php echo $facilities[$x]; @endphp</p>
				</div>
				@if($x % 4 == 0)
					</div>
				@endif
			@php
			}
			@endphp
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
		<div class="facilities-flex" data-toggle="buttons">
			<label class="btn btn-primary btn-facilities">
				<input name="breakfast" type="checkbox" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/breakfast.png") }}"> 
				<p class="detail-icon">Breakfast</p>
			</label>
			<label class="btn btn-primary btn-facilities">
				<input name="smoking_area" type="checkbox" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/smoking-area.png") }}"> 
				<p class="detail-icon">Smoking Area</p>
			</label>
			<label class="btn btn-primary btn-facilities">
				<input name="reservation" type="checkbox" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/reservation.png") }}">
				<p class="detail-icon">Reservation</p>
			</label>
			<label class="btn btn-primary btn-facilities">
				<input name="valet" type="checkbox" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/valet.png") }}">
				<p class="detail-icon">Valet</p>
			</label>
		</div>
		<div class="facilities-flex" data-toggle="buttons">
			<label class="btn btn-primary btn-facilities">
				<input name="parking_lot" type="checkbox" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/parking-lot.png") }}"> 
				<p class="detail-icon">Parking Lot</p>
			</label>
			<label class="btn btn-primary btn-facilities">
				<input name="ac" type="checkbox" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/ac.png") }}"> 
				<p class="detail-icon">Air Conditioner</p>
			</label>
			<label class="btn btn-primary btn-facilities">
				<input name="private_room" type="checkbox" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/private-room.png") }}"> 
				<p class="detail-icon">Private Room</p>
			</label>
			<label class="btn btn-primary btn-facilities">
				<input name="delivery_services" type="checkbox" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/delivery.png") }}"> 
				<p class="detail-icon">Delivery</p>
			</label>
		</div>
		<div class="facilities-flex" data-toggle="buttons">
			<label class="btn btn-primary btn-facilities">
				<input name="wifi" type="checkbox" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/wifi.png") }}"> 
				<p class="detail-icon">WiFi</p>
			</label>
			<label class="btn btn-primary btn-facilities">
				<input name="working_environment" type="checkbox" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/working-space.png") }}"> 
				<p class="detail-icon">Working Space</p>
			</label>
			<label class="btn btn-primary btn-facilities">
				<input name="alcohol" type="checkbox" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/alcohol.png") }}"> 
				<p class="detail-icon">Alcohol</p>
			</label>
			<label class="btn btn-primary btn-facilities">
				<input name="changing_room" type="checkbox" aria-pressed="false" autocomplete="off">
				<img src="{{ asset("img/facilities/changing-room.png") }}"> 
				<p class="detail-icon">Changing Room</p>
			</label>
		</div>
	</div>
	</br>
    {!! Form::button('Update Details', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
    {{ Form::close() }}
</div>