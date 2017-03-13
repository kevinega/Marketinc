<div class="feature-header">
	<h4>DETAILS</h4>
	<i class="material-icons btn-edit">mode_edit</i>
</div>

<div class="feature-details-about">
    <div class="maps">
    	<iframe width="100%" height="400px" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJweaD5rvzaS4RkWhE7KiP38Y&key=AIzaSyDcfHgRTp-c6n4lachCjzNi73DDY5GFdag" allowfullscreen></iframe>
    </div>
    <?php 
    	$desc = Auth::guard()->user()->description;
    	$add = Auth::guard()->user()->address;
    	$phone1 = Auth::guard()->user()->phone_one;
    	$phone2 = Auth::guard()->user()->phone_two;
    	$openh = Auth::guard()->user()->open_hour;
    ?>

    <!-- {{ var_dump($brands) }} -->
    {{ Form::model($brands) }}
    {{ csrf_field() }}
    <div class="about-us" style="border:1px solid grey;">
    	
        <div class="description">
        	<p id="brand-desc">
        	{{ Form::textarea('description') }}
        	</p>
        </div>
        <?php 

        ?>
        <div class="location">
        	<p>
        		{{ Form::text('phone_one') }}</br>
        		{{ Form::text('phone_two') }}</br>
        		<strong>Open Hours:</strong> {{ Form::text('open_hour') }}
        	</p>
        </div>
    </div>
    {{ Form::submit('Save') }}
    {{ Form::close() }}
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
<script type="text/javascript">
	$(document).ready(function() {
		
	});


	function myFunction() {
	    document.getElementById("brand-desc").contentEditable = true;
	    document.getElementById("demo").innerHTML = "The p element above is now editable. Try to change its text.";
	}
</script>