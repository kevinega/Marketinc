
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
	</div>

	<div class="feature-details-facilities">
		<div class="facilities-flex">
			@php 
			$labels = array("Breakfast", "Smoking Area", "Reservation", "Valet", "Live Entertainment", "Air Conditioner", "Private Room", "Delivery", "WiFi", "Working Environment", "Alcohol", "Served Pork");
			$images = array("breakfast", "smoking-area", "reservation", "valet", "live-entertainment", "ac", "private-room", "delivery", "wifi", "working-env", "alcohol", "served-pork");

			for($x = 0; $x < 12; $x++) {
			@endphp
				<div class="facility">
					<img src="{{ asset("img/facilities/$images[$x].png") }}"> 
					<p class="detail-icon" id="{{ $images[$x] }}">{{ $labels[$x] }}</p>
				</div>
			@php
			}
			@endphp
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


    {{-- selanjutnya bikin sendiri ya guys luv --}}
    <div class="open-hour">
	    <label>
	    	<input type="checkbox" class="form-check-input">
	    	Monday
		</label>
		<div class="time">
			from:
			<label>
				<input class="form-control" type="time" value="10:00:00">
			</label>
			to: 
			<label>
				<input class="form-control" type="time" value="20:00:00">
			</label>
		</div>
	</div>

    {!! Form::label('facilities', 'Facilities:') !!}
    
    <div class="feature-details-facilities">
	    <div class="facilities-flex">
		    <div class="facility-edit">
		    	<div class="facility">
					<img src="{{ asset("img/facilities/breakfast.png") }}"> 
					<p class="detail-icon">Breakfast</p>
				</div>
				<label class="switch" aria-pressed="false">
					<input name="breakfast" id="breakfast-fac" type="checkbox" autocomplete="off">
					<div class="slider round"></div>
				</label>
			</div>
			<div class="facility-edit">
				<div class="facility">
					<img src="{{ asset("img/facilities/smoking-area.png") }}"> 
					<p class="detail-icon">Smoking Area</p>
				</div>
				<label class="switch" aria-pressed="false">
					<input name="smoking_area" id="smoking-fac" type="checkbox" autocomplete="off">
					<div class="slider round"></div>
				</label>
			</div>
			<div class="facility-edit">
				<div class="facility">	
					<img src="{{ asset("img/facilities/reservation.png") }}">
					<p class="detail-icon">Reservation</p>
				</div>
				<label class="switch" aria-pressed="false">
					<input name="reservation" id="reservation-fac" type="checkbox" autocomplete="off">
					<div class="slider round"></div>
				</label>
			</div>
			<div class="facility-edit">
				<div class="facility">
					<img src="{{ asset("img/facilities/valet.png") }}">
					<p class="detail-icon">Valet</p>
				</div>
				<label class="switch" aria-pressed="false">
					<input name="valet" id="valet-fac" type="checkbox" autocomplete="off">
					<div class="slider round"></div>
				</label>
			</div>
			<div class="facility-edit">
				<div class="facility">
					<img src="{{ asset("img/facilities/parking-lot.png") }}"> 
					<p class="detail-icon">Live Entertainment</p>
				</div>
				<label class="switch" aria-pressed="false">
					<input name="live" id="live-fac" type="checkbox" autocomplete="off">
					<div class="slider round"></div>
				</label>
			</div>
			<div class="facility-edit">
				<div class="facility">
					<img src="{{ asset("img/facilities/ac.png") }}"> 
					<p class="detail-icon">Air Conditioner</p>
				</div>
				<label class="switch" aria-pressed="false">
					<input name="ac" id="ac-fac" type="checkbox" autocomplete="off">
					<div class="slider round"></div>
				</label>
			</div>
			<div class="facility-edit">	
				<div class="facility">
					<img src="{{ asset("img/facilities/private-room.png") }}"> 
					<p class="detail-icon">Private Room</p>
				</div>
				<label class="switch" aria-pressed="false">
					<input name="private_room" id="private-fac" type="checkbox" autocomplete="off">
					<div class="slider round"></div>
				</label>
			</div>
			<div class="facility-edit">
				<div class="facility">
					<img src="{{ asset("img/facilities/delivery.png") }}"> 
					<p class="detail-icon">Delivery</p>
				</div>
				<label class="switch" aria-pressed="false">
					<input name="delivery_services" id="delivery-fac" type="checkbox" autocomplete="off">
					<div class="slider round"></div>
				</label>
			</div>
			<div class="facility-edit">
				<div class="facility">
					<img src="{{ asset("img/facilities/wifi.png") }}"> 
					<p class="detail-icon">WiFi</p>
				</div>
				<label class="switch" aria-pressed="false">
					<input name="wifi" id="wifi-fac" type="checkbox" autocomplete="off">
					<div class="slider round"></div>
				</label>
			</div>
			<div class="facility-edit">
				<div class="facility">
					<img src="{{ asset("img/facilities/working-space.png") }}"> 
					<p class="detail-icon">Working Environment</p>
				</div>
				<label class="switch" aria-pressed="false">
					<input name="working_environment" id="working-fac" type="checkbox" autocomplete="off">
					<div class="slider round"></div>
				</label>
			</div>
			<div class="facility-edit">
				<div class="facility">
					<img src="{{ asset("img/facilities/alcohol.png") }}"> 
					<p class="detail-icon">Alcohol</p>
				</div>
				<label class="switch" aria-pressed="false">
					<input name="alcohol" id="alcohol-fac"  type="checkbox" autocomplete="off">
					<div class="slider round"></div>
				</label>
			</div>
			<div class="facility-edit">
				<div class="facility">
					<img src="{{ asset("img/facilities/changing-room.png") }}"> 
					<p class="detail-icon">Served Pork</p>
				</div>
				<label class="switch" aria-pressed="false">
					<input name="served_pork" id="pork-fac" type="checkbox" autocomplete="off">
					<div class="slider round"></div>
				</label>
			</div>
		</div>
	</div>
			
	</br>
    {!! Form::button('Update Details', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
    {{ Form::close() }}
</div>